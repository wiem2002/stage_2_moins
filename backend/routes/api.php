<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VentesController;
use App\Http\Controllers\Api\AchatsController;
use App\Http\Controllers\Api\StocksController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\ComptabiliteController;
use App\Http\Controllers\Api\ProjetsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/stages', function () {
    return response()->json([
        [
            'id' => 1,
            'titre' => 'Développeur React Junior',
            'entreprise' => 'Tech Corp',
            'description' => 'Stage de 3 mois pour un développeur React débutant.',
        ],
        [
            'id' => 2,
            'titre' => 'Assistant Backend Laravel',
            'entreprise' => 'Innov Solutions',
            'description' => 'Stage de développement backend Laravel.',
        ],
    ]);
});

Route::get('/dashboard/ventes', [VentesController::class, 'dashboard']);
Route::get('/dashboard/achats', [AchatsController::class, 'dashboard']);
Route::get('/dashboard/stocks', [StocksController::class, 'dashboard']);
Route::get('/dashboard/clients', [ClientsController::class, 'dashboard']);
Route::get('/dashboard/comptabilite', [ComptabiliteController::class, 'dashboard']);
Route::get('/dashboard/projets', [ProjetsController::class, 'dashboard']);
