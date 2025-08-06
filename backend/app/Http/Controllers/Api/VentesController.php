<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class VentesController extends Controller
{
    public function dashboard(): JsonResponse
    {
        try {
            // 1. Total des ventes (réelles)
            $totalVentes = DB::table('HVENTES')->sum('VTE_BRUT');

            // 2. Ventes réelles par mois
            $ventesParMois = DB::table('HVENTES')
                ->selectRaw('YEAR(VTE_DATE) as annee, MONTH(VTE_DATE) as mois, SUM(VTE_BRUT) as total')
                ->groupByRaw('YEAR(VTE_DATE), MONTH(VTE_DATE)')
                ->orderByRaw('YEAR(VTE_DATE), MONTH(VTE_DATE)')
                ->get();

            // 3. Budgets prévus par mois (si DOC_NUMERO contient une date encodée, à remplacer sinon)
            $budgetsParMois = DB::table('PRJ_VENTES_BUDGETEES')
                ->selectRaw('PRJ_CODE, SUM(LPJ_QTE * LPJ_PRIXUN) as total_budget')
                ->groupBy('PRJ_CODE')
                ->get();

            // 4. Top 5 produits les plus vendus
            $topProduits = DB::table('HVENTES')
                ->select('ART_CODE', DB::raw('SUM(VTE_QTE) as quantite'), DB::raw('SUM(VTE_BRUT) as total_vente'))
                ->groupBy('ART_CODE')
                ->orderByDesc('total_vente')
                ->limit(5)
                ->get();

            // 5. Top 5 clients
            $topClients = DB::table('HVENTES')
                ->select('PCF_CODE', DB::raw('SUM(VTE_BRUT) as total'))
                ->groupBy('PCF_CODE')
                ->orderByDesc('total')
                ->limit(5)
                ->get();

            // 6. Total factures acceptées + montant TTC
            $facturesAcceptees = DB::table('FAC_ACPT')
                ->selectRaw('COUNT(*) as total, SUM(FAA_MTTTC) as montant_total')
                ->first();

            // 7. Échéances à venir
            $echeancesAvenir = DB::table('FAC_ECH')
                ->where('ECH_DATE', '>=', now())
                ->selectRaw('COUNT(*) as total, SUM(ECH_MT) as montant_total')
                ->first();

            // 8. Montant des règlements reçus
            $reglementsRecus = DB::table('REGLEMENTS')
                ->selectRaw('SUM(REG_RECU) as total_recu')
                ->first();

            // 9. Détails des règlements par type (ex: chèque, virement, espèce...)
            $reglementsParType = DB::table('REGLEMENTS')
                ->select('REG_TYPE', DB::raw('COUNT(*) as nb'), DB::raw('SUM(REG_RECU) as total'))
                ->groupBy('REG_TYPE')
                ->get();

            // 10. Détail des projets budgétés (totaux par PRJ_CODE)
            $budgetsParProjet = DB::table('PRJ_VENTES_BUDGETEES')
                ->select('PRJ_CODE', DB::raw('SUM(LPJ_PRIXTO) as montant_total'))
                ->groupBy('PRJ_CODE')
                ->get();

            return response()->json([
                'totalVentes' => $totalVentes,
                'ventesParMois' => $ventesParMois,
                'budgetsParMois' => $budgetsParMois,
                'budgetsParProjet' => $budgetsParProjet,
                'topProduits' => $topProduits,
                'topClients' => $topClients,
                'facturesAcceptees' => $facturesAcceptees,
                'echeancesAvenir' => $echeancesAvenir,
                'reglementsRecus' => $reglementsRecus,
                'reglementsParType' => $reglementsParType,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
