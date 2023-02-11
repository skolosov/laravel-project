<?php

use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StorageLocationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('storageLocation.index'));
    }
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('evidences/create',[EvidenceController::class,'create'])->name('evidences.create');
    Route::get('evidences/{id}/edit',[EvidenceController::class,'edit'])->name('evidences.edit');
    Route::post('evidences',[EvidenceController::class,'store'])->name('evidences.store');
    Route::patch('evidences/{id}/update',[EvidenceController::class,'update'])->name('evidences.update');
    Route::delete('evidences/{id}/destroy',[EvidenceController::class,'destroy'])->name('evidences.destroy');
    Route::get('evidences/{id?}',[EvidenceController::class,'index'])->name('evidences');

    Route::get('storage-location',[StorageLocationController::class,'index'])->name('storageLocation.index');
    Route::get('storage-location/create',[StorageLocationController::class,'create'])->name('storageLocation.create');
    Route::get('storage-location/{id}/edit',[StorageLocationController::class,'edit'])->name('storageLocation.edit');
    Route::post('storage-location',[StorageLocationController::class,'store'])->name('storageLocation.store');
    Route::patch('storage-location/{id}/update',[StorageLocationController::class,'update'])->name('storageLocation.update');
    Route::delete('storage-location/{id}/destroy',[StorageLocationController::class,'destroy'])->name('storageLocation.destroy');

    Route::get('staff',[StaffController::class,'index'])->name('staff.index');
    Route::get('staff/create',[StaffController::class,'create'])->name('staff.create');
    Route::get('staff/{id}/edit',[StaffController::class,'edit'])->name('staff.edit');
    Route::post('staff',[StaffController::class,'store'])->name('staff.store');
    Route::patch('staff/{id}/update',[StaffController::class,'update'])->name('staff.update');
    Route::delete('staff/{id}/destroy',[StaffController::class,'destroy'])->name('staff.destroy');

});

