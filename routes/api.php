<?php

use App\Http\Controllers\DocController;
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

Route::get('/docs', [DocController::class, 'getDocs']);
Route::patch('/docs/{id}', [DocController::class, 'updateStatus'])->name('updateStatus');
//Route::post('/docs', [DocController::class, 'store']);
//Route::put('/docs/{id}', [DocController::class, 'update']);
//Route::delete('/docs/{id}', [DocController::class, 'destroy']);
