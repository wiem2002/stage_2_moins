<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjetsController extends Controller
{
    public function dashboard()
    {
        $nbProjets = DB::table('PROJETS')->count();
        $projetsParEtat = DB::table('PROJETS')
            ->select('PRJ_ETAT', DB::raw('count(*) as total'))
            ->groupBy('PRJ_ETAT')
            ->get();

        return response()->json([
            'nbProjets' => $nbProjets,
            'projetsParEtat' => $projetsParEtat,
        ]);
    } //
}
