<?php

use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\StorageLocationController;
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

Route::middleware('auth:sanctum')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);
//Route::get('storage-locations/create',[StorageLocationController::class,'create'])->name('storageLocation.create');

Route::group(
    ['prefix' => 'storage-locations'],
    function () {
        Route::get('/', [StorageLocationController::class, 'index'])->name('storageLocation.index');
        Route::get('/{id}', [StorageLocationController::class, 'show'])->name('storageLocation.show');
        Route::post('/', [StorageLocationController::class, 'store'])->name('storageLocation.store');
        Route::patch('{id}', [StorageLocationController::class, 'update'])->name('storageLocation.update');
        Route::delete('{id}', [StorageLocationController::class, 'destroy'])->name('storageLocation.destroy');

        Route::group(['prefix' => '{storageLocation}/evidences'], function () {
            Route::get('/', [EvidenceController::class, 'index'])->name('evidences.index');
            Route::get('{id}', [EvidenceController::class, 'show'])->name('evidences.show');
            Route::post('/', [EvidenceController::class, 'store'])->name('evidences.store');
            Route::patch('{id}', [EvidenceController::class, 'update'])->name('evidences.update');
            Route::delete('{id}', [EvidenceController::class, 'destroy'])->name('evidences.destroy');
        });
    }
);
//Route::get('{storageLocation}/evidences/',[EvidenceController::class,'index'])->name('evidences');
//Route::get('storage-locations/',[StorageLocationController::class,'index'])->name('storageLocation');
//Route::get('storage-locations/{id}/edit',[StorageLocationController::class,'edit'])->name('storageLocation.edit');

