<?php

use App\Http\Controllers\EvidenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('evidences', EvidenceController::class);
//Route::get('evidences/', [EvidenceController::class, 'index']);
//Route::get('evidences/{id}', [EvidenceController::class, 'show']);
//Route::post('evidences', [EvidenceController::class, 'store']);
//Route::patch('evidences/{id}', [EvidenceController::class, 'update']);
//Route::delete('evidences/{id}', [EvidenceController::class, 'destroy']);
//Route::post('load', [EvidenceController::class, 'loadFile']);
//Route::post();
//Route::put();
//Route::patch();
//Route::delete();

//Route::post('/docs', [DocController::class, 'store']);
//Route::put('/docs/{id}', [DocController::class, 'update']);
//Route::delete('/docs/{id}', [DocController::class, 'destroy']);
