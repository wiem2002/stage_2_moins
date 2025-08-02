<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
  public function dashboard()
    {
        $nbTiers = DB::table('TIERS')->count();
        $nbContacts = DB::table('CONTACTS')->count();

        return response()->json([
            'nbClientsFournisseurs' => $nbTiers,
            'nbContacts' => $nbContacts,
        ]);
    }  //
}
