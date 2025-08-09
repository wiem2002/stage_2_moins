<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ClientsController extends Controller
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
            'total_clients' => (int)DB::table('TIERS')->where('PCF_TYPE', 'C')->count(),
            'total_prospects' => (int)DB::table('TIERS')->where('PCF_TYPE', 'P')->count(),
            // Retiré le chiffre d'affaires qui nécessitait la table FACTURE
            'clients_actifs' => (int)DB::table('TIERS')
                ->where('PCF_TYPE', 'C')
                ->where('PCF_BLOQUE', 0)
                ->count(),
            'contacts_recents' => (int)DB::table('CONTACTS')
                ->where('CCT_TABLE', 'PCF')
                ->where('CCT_DTMAJ', '>', now()->subMonth())
                ->count()
        ];
    }

    private function getDetailsData(): array
    {
        return [
            'par_region' => DB::table('TIERS')
                ->select([
                    'PCF_REG as region',
                    DB::raw('COUNT(*) as nombre_clients')
                ])
                ->where('PCF_TYPE', 'C')
                ->groupBy('PCF_REG')
                ->orderByDesc('nombre_clients')
                ->get()
                ->toArray(),

            'par_representant' => DB::table('TIERS')
                ->select([
                    'REP_CODE',
                    DB::raw('COUNT(*) as nombre_clients')
                ])
                ->where('PCF_TYPE', 'C')
                ->groupBy('REP_CODE')
                ->orderByDesc('nombre_clients')
                ->take(10)
                ->get()
                ->toArray(),

            'clients_importants' => DB::table('TIERS')
                ->select([
                    'PCF_CODE',
                    'PCF_RS',
                    'PCF_CAPITA as capital',
                    'PCF_VILLE'
                ])
                ->where('PCF_TYPE', 'C')
                ->whereNotNull('PCF_CAPITA')
                ->orderByDesc('PCF_CAPITA')
                ->take(10)
                ->get()
                ->toArray(),

            'derniers_contacts' => DB::table('CONTACTS')
                ->join('TIERS', 'CONTACTS.CCT_CODE', '=', 'TIERS.PCF_CODE')
                ->where('CONTACTS.CCT_TABLE', 'PCF')
                ->select([
                    'CONTACTS.CCT_NOM',
                    'CONTACTS.CCT_PRENOM',
                    'CONTACTS.CCT_FONCT',
                    'CONTACTS.CCT_TELD',
                    'CONTACTS.CCT_EMAIL',
                    'TIERS.PCF_RS',
                    'CONTACTS.CCT_DTMAJ as date_contact'
                ])
                ->orderByDesc('CONTACTS.CCT_DTMAJ')
                ->take(10)
                ->get()
                ->toArray()
        ];
    }

    private function getAlertesData(): array
    {
        return [
            'clients_bloques' => DB::table('TIERS')
                ->where('PCF_BLOQUE', 1)
                ->where('PCF_TYPE', 'C')
                ->select([
                    'PCF_CODE',
                    'PCF_RS',
                    'PCF_VILLE',
                    'PCF_DATCLO as date_blocage'
                ])
                ->orderByDesc('PCF_DATCLO')
                ->take(5)
                ->get()
                ->toArray(),

            'risques_impayes' => DB::table('TIERS')
                ->whereNotNull('PCF_RISQUE')
                ->where('PCF_TYPE', 'C')
                ->select([
                    'PCF_CODE',
                    'PCF_RS',
                    'PCF_RISQUE',
                    'PCF_MT_REL as montant_relance'
                ])
                ->orderByDesc('PCF_RISQUE')
                ->take(5)
                ->get()
                ->toArray(),

            'sans_contact_recent' => DB::table('TIERS')
                ->where('PCF_TYPE', 'C')
                ->whereNotExists(function($query) {
                    $query->select(DB::raw(1))
                          ->from('CONTACTS')
                          ->whereRaw('CONTACTS.CCT_CODE = TIERS.PCF_CODE')
                          ->where('CONTACTS.CCT_DTMAJ', '>', now()->subYear());
                })
                ->select([
                    'PCF_CODE',
                    'PCF_RS',
                    'PCF_DTCREE as date_creation'
                ])
                ->orderBy('PCF_DTCREE')
                ->take(5)
                ->get()
                ->toArray()
        ];
    }
}