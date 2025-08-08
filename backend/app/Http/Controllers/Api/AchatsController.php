<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class AchatsController extends Controller
{
    public function dashboard(): JsonResponse
    {
        try {
            return response()->json([
                'synthese' => $this->getSyntheseData(),
                'details' => $this->getDetailsData(),
                'alertes' => $this->getAlertesData(),
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Erreur de traitement',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    private function getSyntheseData(): array
    {
        return [
            'total_budget' => (float)DB::table('PRJ_ACHATS_BUDGETES')
                ->sum(DB::raw('LPJ_QTE * LPJ_PRIXUN')),
            
            'total_realise' => (float)DB::table('PRJ_FRAIS_REALISES')
                ->sum('LPJ_PRIXTO'),
            
            'ecart_budget' => $this->calculateBudgetGap(),
            
            'taux_engagement' => (float)DB::table('PRJ_ACHATS_BUDGETES')
                ->where('LPJ_AVANCE', '>', 0)
                ->avg('LPJ_AVANCE')
        ];
    }

    private function calculateBudgetGap(): array
    {
        $budget = (float)DB::table('PRJ_ACHATS_BUDGETES')
            ->sum(DB::raw('LPJ_QTE * LPJ_PRIXUN'));
        
        $realise = (float)DB::table('PRJ_FRAIS_REALISES')
            ->sum('LPJ_PRIXTO');

        return [
            'montant' => $realise - $budget,
            'pourcentage' => $budget ? (($realise - $budget) / $budget * 100) : 0
        ];
    }

    private function getDetailsData(): array
    {
        return [
            'par_projet' => DB::table('PRJ_ACHATS_BUDGETES')
                ->select([
                    'PRJ_CODE',
                    DB::raw('SUM(LPJ_QTE * LPJ_PRIXUN) as budget'),
                    DB::raw('(SELECT SUM(LPJ_PRIXTO) FROM PRJ_FRAIS_REALISES WHERE PRJ_FRAIS_REALISES.PRJ_CODE = PRJ_ACHATS_BUDGETES.PRJ_CODE) as realise')
                ])
                ->groupBy('PRJ_CODE')
                ->orderByDesc('budget')
                ->take(10) // TOP 10 equivalent
                ->get()
                ->toArray(),

            'par_fournisseur' => DB::table('PRJ_FRAIS_REALISES')
                ->join('REAPPRO', 'PRJ_FRAIS_REALISES.ART_CODE', '=', 'REAPPRO.ART_CODE')
                ->select([
                    'REAPPRO.PCF_CODE as fournisseur',
                    DB::raw('SUM(LPJ_PRIXTO) as montant'),
                    DB::raw('COUNT(DISTINCT PRJ_FRAIS_REALISES.PRJ_CODE) as projets')
                ])
                ->groupBy('REAPPRO.PCF_CODE')
                ->orderByDesc('montant')
                ->take(10)
                ->get()
                ->toArray(),

            'evolution_mensuelle' => DB::table('PRJ_FRAIS_REALISES')
                ->selectRaw('
                    YEAR(LPJ_DATE) as annee,
                    MONTH(LPJ_DATE) as mois,
                    SUM(LPJ_PRIXTO) as total,
                    (SELECT SUM(LPJ_QTE * LPJ_PRIXUN) 
                     FROM PRJ_ACHATS_BUDGETES 
                     WHERE YEAR(LPJ_DATE) = YEAR(PRJ_FRAIS_REALISES.LPJ_DATE)
                     AND MONTH(LPJ_DATE) = MONTH(PRJ_FRAIS_REALISES.LPJ_DATE)) as budget
                ')
                ->whereNotNull('LPJ_DATE')
                ->groupByRaw('YEAR(LPJ_DATE), MONTH(LPJ_DATE)')
                ->orderByRaw('YEAR(LPJ_DATE), MONTH(LPJ_DATE)')
                ->get()
                ->toArray()
        ];
    }

    private function getAlertesData(): array
    {
        return [
            'depassements' => $this->getBudgetOverruns(),
            'reappro_urgent' => DB::table('REAPPRO')
                ->where('ART_CD_ACH', '<=', 5)
                ->whereRaw('LIG_QTE < LIG_Q_CMDE * 0.8')
                ->select([
                    'ART_CODE',
                    'ART_GAMME',
                    'LIG_QTE as stock',
                    'LIG_Q_CMDE as commande'
                ])
                ->orderBy('ART_CD_ACH')
                ->take(10)
                ->get()
                ->toArray(),

            'remises_manquees' => DB::table('REMISE_FOURN')
                ->leftJoin('REAPPRO', 'REMISE_FOURN.PCF_CODE', '=', 'REAPPRO.PCF_CODE')
                ->whereNotNull('REMISE_FOURN.ART_REMISE')
                ->whereColumn('REAPPRO.ART_REMISE', '<>', 'REMISE_FOURN.ART_REMISE')
                ->select([
                    'REMISE_FOURN.PCF_CODE',
                    'REMISE_FOURN.ART_REMISE as remise_negociee',
                    'REAPPRO.ART_REMISE as remise_appliquee'
                ])
                ->distinct()
                ->get()
                ->toArray()
        ];
    }

    private function getBudgetOverruns(): array
    {
        // Solution alternative plus compatible
        $results = DB::table('PRJ_ACHATS_BUDGETES as p')
            ->select([
                'p.PRJ_CODE',
                DB::raw('SUM(p.LPJ_QTE * p.LPJ_PRIXUN) as budget'),
                DB::raw('(SELECT SUM(f.LPJ_PRIXTO) 
                          FROM PRJ_FRAIS_REALISES f 
                          WHERE f.PRJ_CODE = p.PRJ_CODE) as realise')
            ])
            ->groupBy('p.PRJ_CODE')
            ->havingRaw('(SELECT SUM(f.LPJ_PRIXTO) 
                          FROM PRJ_FRAIS_REALISES f 
                          WHERE f.PRJ_CODE = p.PRJ_CODE) > SUM(p.LPJ_QTE * p.LPJ_PRIXUN) * 1.1')
            ->orderByDesc('budget')
            ->take(5)
            ->get()
            ->toArray();

        return $results;
    }
}