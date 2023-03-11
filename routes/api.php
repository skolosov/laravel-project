<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\StaffController;
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

Route::group(['middleware' => 'api', 'prefix' => 'auth'],
    function ($router) {
        Route::post('login', [AuthController::class,'login']);
        Route::post('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
        Route::post('me', [AuthController::class,'me']);
    }
);

Route::group(
    ['middleware' => 'auth:api','prefix' => 'storage-locations'],
    function () {
        Route::get('/', [StorageLocationController::class, 'index'])->name('storageLocation.index');
        Route::get('/{id}', [StorageLocationController::class, 'show'])->name('storageLocation.show');
        Route::post('/', [StorageLocationController::class, 'store'])->name('storageLocation.store');
        Route::patch('/{id}', [StorageLocationController::class, 'update'])->name('storageLocation.update');
        Route::delete('{id}', [StorageLocationController::class, 'destroy'])->name('storageLocation.destroy');
    }
);
Route::group(
    ['middleware' => 'auth:api','prefix' => 'evidences'],
    function () {
        Route::get('/', [EvidenceController::class, 'index'])->name('evidences.index');
        Route::get('{id}', [EvidenceController::class, 'show'])->name('evidences.show');
        Route::post('/', [EvidenceController::class, 'store'])->name('evidences.store');
        Route::patch('{id}', [EvidenceController::class, 'update'])->name('evidences.update');
        Route::delete('{id}', [EvidenceController::class, 'destroy'])->name('evidences.destroy');
    }
);

Route::group(
    ['middleware' => 'auth:api','prefix' => 'staffs'],
    function () {
        Route::get('/', [StaffController::class, 'index'])->name('staffs.index');
        Route::get('{id}', [StaffController::class, 'show'])->name('staffs.show');
        Route::post('/', [StaffController::class, 'store'])->name('staffs.store');
        Route::patch('{id}', [StaffController::class, 'update'])->name('staffs.update');
        Route::delete('{id}', [StaffController::class, 'destroy'])->name('staffs.destroy');
    }
);

Route::get('divisions', [DivisionController::class, 'index'])->name('divisions.index');

