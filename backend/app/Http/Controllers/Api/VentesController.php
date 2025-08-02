<?php

// app/Http/Controllers/Api/VentesController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VentesController extends Controller
{
    public function dashboard()
{
    $totalVentes = DB::table('hventes')->sum('montant');
    
    $ventesParMois = DB::table('hventes')
        ->select(DB::raw('MONTH(date) as mois'), DB::raw('SUM(montant) as total'))
        ->groupBy('mois')
        ->orderBy('mois')
        ->get();

    $facturesAcceptees = DB::table('fac_acpt')->count();
    $echeancesAvenir = DB::table('fac_ech')
        ->where('ech_date', '>=', now())
        ->count();
    $reglementsRecus = DB::table('reglements')->sum('montant');

    return response()->json([
        'totalVentes' => $totalVentes,
        'ventesParMois' => $ventesParMois,
        'facturesAcceptees' => $facturesAcceptees,
        'echeancesAvenir' => $echeancesAvenir,
        'reglementsRecus' => $reglementsRecus,
    ]);
}
}
