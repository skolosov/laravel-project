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
        return redirect(route('evidences'));
    }
    return view('welcome');
});

Auth::routes();
Route::get('test', function () {
    $data = [
        ['title' => 'title1', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, aspernatur consequatur culpa laboriosam natus numquam soluta. Accusamus aperiam eius enim, esse ipsa iure nihil, nisi numquam porro quas quidem voluptates?'],
        ['title' => 'title2', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, aspernatur consequatur culpa laboriosam natus numquam soluta. Accusamus aperiam eius enim, esse ipsa iure nihil, nisi numquam porro quas quidem voluptates?'],
        ['title' => 'title3', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, aspernatur consequatur culpa laboriosam natus numquam soluta. Accusamus aperiam eius enim, esse ipsa iure nihil, nisi numquam porro quas quidem voluptates?'],
        ['title' => 'title4', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, aspernatur consequatur culpa laboriosam natus numquam soluta. Accusamus aperiam eius enim, esse ipsa iure nihil, nisi numquam porro quas quidem voluptates?'],
        ['title' => 'title5', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, aspernatur consequatur culpa laboriosam natus numquam soluta. Accusamus aperiam eius enim, esse ipsa iure nihil, nisi numquam porro quas quidem voluptates?'],

    ];

    return view('test', ['data' => $data]);
});
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
