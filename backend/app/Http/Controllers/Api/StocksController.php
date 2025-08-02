<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StocksController extends Controller
{
   public function dashboard()
    {
        $totalArticles = DB::table('ARTICLES')->count();
        $totalStock = DB::table('ART_STOCK')->sum('QTE_STOCK');
        $totalInv = DB::table('LIG_INV')->sum('QTE');
        $totalLots = DB::table('LIG_INV_LOTS')->count();

        return response()->json([
            'nbArticles' => $totalArticles,
            'stockTotal' => $totalStock,
            'inventaire' => $totalInv,
            'lotsInventaires' => $totalLots,
        ]);
    } //
}
