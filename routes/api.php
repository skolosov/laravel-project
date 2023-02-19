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
Route::group(
    ['prefix' => 'storage-locations'],
    function () {
        Route::get('/', [StorageLocationController::class, 'index'])->name('storageLocation.index');
        Route::get('/{id}', [StorageLocationController::class, 'show'])->name('storageLocation.show');
        Route::get('create', [StorageLocationController::class, 'create'])->name('storageLocation.create');
        Route::get('{id}/edit', [StorageLocationController::class, 'edit'])->name('storageLocation.edit');
        Route::post('/', [StorageLocationController::class, 'store'])->name('storageLocation.store');
        Route::patch('{id}/update', [StorageLocationController::class, 'update'])->name('storageLocation.update');
        Route::delete('{id}/destroy',[StorageLocationController::class,'destroy'])->name('storageLocation.destroy');
    }
);
Route::group(
    ['prefix' => '/{storageLocation}/evidences'],
    function () {
        Route::get('/', [EvidenceController::class, 'index'])->name('evidences');
        Route::get('/create', [EvidenceController::class, 'create'])->name('evidences.create');
        Route::post('/', [EvidenceController::class, 'store'])->name('evidences.store');

    }
);
//Route::get('{storageLocation}/evidences/',[EvidenceController::class,'index'])->name('evidences');
Route::group(
    ['prefix' => 'evidences'],
    function () {
        Route::get('/{id}', [EvidenceController::class, 'show'])->name('evidences.show');
        Route::get('/{id}/edit', [EvidenceController::class, 'edit'])->name('evidences.edit');
        Route::patch('/{id}/update', [EvidenceController::class, 'update'])->name('evidences.update');
        Route::delete('/{id}/destroy', [EvidenceController::class, 'destroy'])->name('evidences.destroy');
    }
);



//Route::get('storage-locations/',[StorageLocationController::class,'index'])->name('storageLocation');
//Route::get('storage-locations/create',[StorageLocationController::class,'create'])->name('storageLocation.create');
//Route::get('storage-locations/{id}/edit',[StorageLocationController::class,'edit'])->name('storageLocation.edit');

