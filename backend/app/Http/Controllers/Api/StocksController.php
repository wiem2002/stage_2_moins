<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PDO;
use Illuminate\Support\Facades\Log;

class StocksController extends Controller
{
    /**
     * Récupère les stocks paginés
     */
    public function dashboard(Request $request): JsonResponse
    {
        try {
            // Activation du log des requêtes SQL
            DB::connection('sqlsrv')->enableQueryLog();

            $query = DB::connection('sqlsrv')
                ->table('ART_STOCK')
                ->join('ARTICLES', 'ART_STOCK.ART_CODE', '=', 'ARTICLES.ART_CODE');

            // Filtres avec vérification
            if ($request->filled('categorie')) {
                $query->where('ARTICLES.ART_CATEG', $request->categorie);
            }

            if ($request->filled('emplacement')) {
                $query->where('ART_STOCK.DEP_CODE', $request->emplacement);
            }

            if ($request->filled('stock_min')) {
                $query->where('ART_STOCK.STK_REEL', '>=', (int)$request->stock_min);
            }

            $articlesStock = $query->select([
                'ARTICLES.ART_CODE',
                'ARTICLES.ART_LIB',
                'ART_STOCK.STK_REEL',
                'ART_STOCK.STK_SEUIL',
                DB::raw('CAST(ARTICLES.ART_P_ACH * ART_STOCK.STK_REEL AS DECIMAL(10,2)) as valeur'),
                'ARTICLES.ART_CATEG',
                'ART_STOCK.DEP_CODE'
            ])->paginate(20);

            // Log de la requête SQL
            $queries = DB::connection('sqlsrv')->getQueryLog();
            Log::info('SQL Query:', $queries);

            return response()->json([
                'success' => true,
                'articles_stock' => $articlesStock,
                'debug' => config('app.debug') ? [
                    'query' => $queries,
                    'count' => $articlesStock->count(),
                    'total' => $articlesStock->total()
                ] : null,
                'timestamp' => now()->toDateTimeString()
            ]);

        } catch (\Exception $e) {
            Log::error('Database Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur de base de données',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Export CSV des stocks
     */
    public function export(Request $request): StreamedResponse
    {
        try {
            $query = DB::connection('sqlsrv')
                ->table('ART_STOCK')
                ->join('ARTICLES', 'ART_STOCK.ART_CODE', '=', 'ARTICLES.ART_CODE');

            if ($request->filled('categorie')) {
                $query->where('ARTICLES.ART_CATEG', $request->categorie);
            }

            if ($request->filled('emplacement')) {
                $query->where('ART_STOCK.DEP_CODE', $request->emplacement);
            }

            if ($request->filled('stock_min')) {
                $query->where('ART_STOCK.STK_REEL', '>=', (int)$request->stock_min);
            }

            $stocks = $query->select([
                'ARTICLES.ART_CODE',
                'ARTICLES.ART_LIB',
                'ART_STOCK.STK_REEL',
                'ART_STOCK.STK_SEUIL',
                DB::raw('CAST(ARTICLES.ART_P_ACH * ART_STOCK.STK_REEL AS DECIMAL(10,2)) as valeur'),
                'ARTICLES.ART_CATEG',
                'ART_STOCK.DEP_CODE'
            ])->get();

            $headers = [
                'Code Article', 'Libellé', 'Stock Réel',
                'Seuil Minimum', 'Valeur (TND)', 'Catégorie', 'Emplacement'
            ];

            return response()->streamDownload(
                function () use ($stocks, $headers) {
                    $file = fopen('php://output', 'w');
                    // BOM pour UTF-8
                    fwrite($file, "\xEF\xBB\xBF");
                    fputcsv($file, $headers);
                    
                    foreach ($stocks as $stock) {
                        fputcsv($file, [
                            $stock->ART_CODE,
                            $stock->ART_LIB,
                            $stock->STK_REEL,
                            $stock->STK_SEUIL,
                            number_format($stock->valeur, 2),
                            $stock->ART_CATEG,
                            $stock->DEP_CODE
                        ]);
                    }
                    fclose($file);
                },
                'export_stocks_' . now()->format('Y-m-d_His') . '.csv',
                [
                    'Content-Type' => 'text/csv; charset=UTF-8',
                ]
            );

        } catch (\Exception $e) {
            Log::error('Export Error:', ['error' => $e->getMessage()]);
            abort(500, 'Erreur lors de l\'export');
        }
    }
}