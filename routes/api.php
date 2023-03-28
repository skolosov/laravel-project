<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EvidenceAppearanceController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StorageLocationController;
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


Route::group(
    ['prefix' => 'auth'],
    function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
        Route::post('me', [AuthController::class, 'me'])->name('me');
        Route::post('registration', [AuthController::class, 'register'])->name('register');
    }
);

Route::apiResource('storage-locations', StorageLocationController::class)
    ->middleware(['auth:api']);
Route::apiResource('evidences', EvidenceController::class)
    ->middleware(['auth:api']);
Route::apiResource('employees', EmployeeController::class)
    ->middleware(['auth:api']);
Route::apiResource('evidence-appearances', EvidenceAppearanceController::class)
    ->middleware(['auth:api']);



Route::get('divisions', [DivisionController::class, 'index'])->name('divisions.index');

