<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ProjetsController extends Controller
{
    public function dashboard(): JsonResponse
    {
        try {
            // 1. Nombre total de projets
            $totalProjets = DB::table('PROJETS')->count();

            // 2. Projets par état
            $projetsParEtat = DB::table('PROJETS')
                ->select('PRJ_ETAT', DB::raw('COUNT(*) as total'))
                ->groupBy('PRJ_ETAT')
                ->get();

            // 3. Nombre d'activités planning par projet (extrait top 5)
            $activitesParProjet = DB::table('PROJETS as p')
                ->join('PRJ_PLANNING as pl', 'p.PRJ_CODE', '=', 'pl.PRJ_CODE')
                ->select('p.PRJ_CODE', 'p.PRJ_LIB', DB::raw('COUNT(pl.LPJ_NUMERO) as nb_activites'))
                ->groupBy('p.PRJ_CODE', 'p.PRJ_LIB')
                ->orderByDesc('nb_activites')
                ->limit(5)
                ->get();

            // 4. Dates extrêmes d'activités planning (min et max global)
            $datesPlanning = DB::table('PRJ_PLANNING')
                ->selectRaw('MIN(LPJ_DATE) as date_min, MAX(LPJ_DATE) as date_max')
                ->first();

            return response()->json([
                'totalProjets' => $totalProjets,
                'projetsParEtat' => $projetsParEtat,
                'activitesParProjet' => $activitesParProjet,
                'datesPlanning' => $datesPlanning,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
