<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EvidenceFormController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\HomeController;
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
        return redirect(route('evidences'));
    }
    return view('welcome');
});

Auth::routes();
//Route::resource('evidences', EvidenceController::class);
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/evidence-form', [EvidenceFormController::class, 'getForm'])->name('evidence-form');
//Route::get('/evidences', [EvidenceController::class, 'index'])->name('evidences');;
Route::get('evidences',[EvidenceController::class,'index'])->name('evidences');
Route::get('evidences/create',[EvidenceController::class,'create'])->name('evidences.create');
Route::get('evidences/{id}/edit',[EvidenceController::class,'edit'])->name('evidences.edit');
Route::post('evidences',[EvidenceController::class,'store'])->name('evidences.store');
Route::patch('evidences/{id}/update',[EvidenceController::class,'update'])->name('evidences.update');
Route::delete('evidences/{id}/destroy',[EvidenceController::class,'destroy'])->name('evidences.destroy');

Route::get('storage-location',[StorageLocationController::class,'index'])->name('storageLocation.index');
Route::get('storage-location/create',[StorageLocationController::class,'create'])->name('storageLocation.create');
Route::get('storage-location/{id}/edit',[StorageLocationController::class,'edit'])->name('storageLocation.edit');
Route::post('storage-location',[StorageLocationController::class,'store'])->name('storageLocation.store');
Route::patch('storage-location/{id}/update',[StorageLocationController::class,'update'])->name('storageLocation.update');
Route::delete('storage-location/{id}/destroy',[StorageLocationController::class,'destroy'])->name('storageLocation.destroy');
