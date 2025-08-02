<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-connection', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Connexion réussie à la base de données : " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "❌ Erreur de connexion : " . $e->getMessage();
    }
});