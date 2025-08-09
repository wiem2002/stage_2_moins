<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class StocksController extends Controller
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
            'total_articles' => (int)DB::table('ARTICLES')->count(),
            'total_valeur' => (float)DB::table('ART_STOCK')
                ->join('ARTICLES', 'ART_STOCK.ART_CODE', '=', 'ARTICLES.ART_CODE')
                ->sum(DB::raw('ART_STOCK.STK_REEL * ARTICLES.ART_P_ACH')),
            'alertes_stock_bas' => (int)DB::table('ART_STOCK')
                ->whereColumn('STK_REEL', '<', 'STK_SEUIL')
                ->count()
        ];
    }

    private function getDetailsData(): array
    {
        // Solution pour SQL Server - éviter les sous-requêtes dans les agrégats
        $stocksWithPrice = DB::table('ART_STOCK')
            ->join('ARTICLES', 'ART_STOCK.ART_CODE', '=', 'ARTICLES.ART_CODE')
            ->select(
                'ART_STOCK.DEP_CODE',
                'ART_STOCK.STK_REEL',
                'ARTICLES.ART_P_ACH'
            )
            ->get();

        $groupedByLocation = $stocksWithPrice->groupBy('DEP_CODE')->map(function ($items) {
            return [
                'quantite' => $items->sum('STK_REEL'),
                'valeur' => $items->sum(function ($item) {
                    return $item->STK_REEL * $item->ART_P_ACH;
                })
            ];
        });

        return [
            'articles_stock_bas' => DB::table('ART_STOCK')
                ->join('ARTICLES', 'ART_STOCK.ART_CODE', '=', 'ARTICLES.ART_CODE')
                ->whereColumn('ART_STOCK.STK_REEL', '<', 'ART_STOCK.STK_SEUIL')
                ->select([
                    'ARTICLES.ART_CODE',
                    'ARTICLES.ART_LIB',
                    'ART_STOCK.STK_REEL',
                    'ART_STOCK.STK_SEUIL',
                    DB::raw('ARTICLES.ART_P_ACH * ART_STOCK.STK_REEL as valeur')
                ])
                ->orderByDesc('valeur')
                ->take(10)
                ->get()
                ->toArray(),

            'par_categorie' => DB::table('ARTICLES')
                ->join('ART_STOCK', 'ARTICLES.ART_CODE', '=', 'ART_STOCK.ART_CODE')
                ->select([
                    'ARTICLES.ART_CATEG',
                    DB::raw('SUM(ART_STOCK.STK_REEL * ARTICLES.ART_P_ACH) as valeur'),
                    DB::raw('COUNT(*) as nombre_articles')
                ])
                ->groupBy('ARTICLES.ART_CATEG')
                ->get()
                ->toArray(),

            'par_emplacement' => $groupedByLocation->map(function ($value, $key) {
                return [
                    'DEP_CODE' => $key,
                    'quantite' => $value['quantite'],
                    'valeur' => $value['valeur']
                ];
            })->values()->toArray(),

            'mouvements_recents' => DB::table('LIG_INV')
                ->join('ARTICLES', 'LIG_INV.ART_CODE', '=', 'ARTICLES.ART_CODE')
                ->select([
                    'LIG_INV.DOC_DATE',
                    'LIG_INV.DOC_PIECE',
                    'LIG_INV.ART_CODE',
                    'ARTICLES.ART_LIB',
                    'LIG_INV.INV_QTE',
                    DB::raw('CASE 
                        WHEN DOC_PIECE LIKE \'%ENT%\' THEN \'Entrée\' 
                        ELSE \'Sortie\' 
                    END as type')
                ])
                ->orderByDesc('DOC_DATE')
                ->take(10)
                ->get()
                ->toArray()
        ];
    }

    private function getAlertesData(): array
    {
        return [
            'stock_bas' => DB::table('ART_STOCK')
                ->join('ARTICLES', 'ART_STOCK.ART_CODE', '=', 'ARTICLES.ART_CODE')
                ->whereColumn('ART_STOCK.STK_REEL', '<', 'ART_STOCK.STK_SEUIL')
                ->select([
                    'ARTICLES.ART_CODE',
                    'ARTICLES.ART_LIB',
                    'ART_STOCK.STK_REEL',
                    'ART_STOCK.STK_SEUIL',
                    DB::raw('ARTICLES.ART_P_ACH * ART_STOCK.STK_REEL as valeur')
                ])
                ->orderByDesc('valeur')
                ->take(5)
                ->get()
                ->toArray(),

            'peremption' => DB::table('LIG_INV_LOTS')
                ->whereNotNull('LLI_DT_PER')
                ->where('LLI_DT_PER', '<', now()->addDays(30))
                ->select([
                    'LLI_NUMLOT',
                    'LLI_DT_FAB',
                    'LLI_DT_PER',
                    DB::raw('DATEDIFF(day, GETDATE(), LLI_DT_PER) as jours_restants')
                ])
                ->orderBy('LLI_DT_PER')
                ->take(5)
                ->get()
                ->toArray(),

            'mouvements_anormaux' => DB::table('LIG_INV')
                ->join('ARTICLES', 'LIG_INV.ART_CODE', '=', 'ARTICLES.ART_CODE')
                ->where('INV_QTE', '>', 100)
                ->select([
                    'LIG_INV.DOC_DATE',
                    'LIG_INV.ART_CODE',
                    'ARTICLES.ART_LIB',
                    'LIG_INV.INV_QTE',
                    DB::raw('CASE 
                        WHEN DOC_PIECE LIKE \'%ENT%\' THEN \'Entrée\' 
                        ELSE \'Sortie\' 
                    END as type')
                ])
                ->orderByDesc('INV_QTE')
                ->take(5)
                ->get()
                ->toArray()
        ];
    }
}