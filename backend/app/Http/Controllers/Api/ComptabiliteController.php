<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComptabiliteController extends Controller
{
     public function dashboard()
    {
        $soldeCumule = DB::table('CPT_CUMUL')->sum('MONTANT');
        $soldeReport = DB::table('CPT_REPORT')->sum('MONTANT');
        $totalReglements = DB::table('REGLEMENTS')->sum('MONTANT');
        $totalImpaye = DB::table('REG_IMPAYES')->sum('MONTANT');

        return response()->json([
            'soldeCumule' => $soldeCumule,
            'soldeReport' => $soldeReport,
            'reglements' => $totalReglements,
            'impayes' => $totalImpaye,
        ]);
    }//
}
