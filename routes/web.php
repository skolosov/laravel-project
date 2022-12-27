<?php

use App\Http\Controllers\EvidenceFormController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\HomeController;
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
        return redirect(route('home'));
    }
    return view('welcome');
});

Auth::routes();
Route::resource('evidences', EvidenceController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/evidence-form', [EvidenceFormController::class, 'getForm'])->name('evidence-form');
Route::get('/evidences', [EvidenceController::class, 'index'])->name('evidences');;
