<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AchatsController extends Controller
{
  public function dashboard()
    {
        $totalBudgetAchats = DB::table('PRJ_ACHATS_BUDGETES')->sum('MONTANT');
        $totalReappro = DB::table('REAPPRO')->sum('MONTANT');
        $totalRemisesFourn = DB::table('REMISE_FOURN')->sum('MONTANT');
        $totalFrais = DB::table('PRJ_FRAIS_REALISES')->sum('MONTANT');

        return response()->json([
            'budgetAchats' => $totalBudgetAchats,
            'reapprovisionnements' => $totalReappro,
            'remisesFournisseurs' => $totalRemisesFourn,
            'fraisAchats' => $totalFrais,
        ]);
    }  //
}
