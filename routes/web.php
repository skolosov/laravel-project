<?php



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
    return view('welcome');
});
//    if (Auth::check()) {
//        return redirect(route('storageLocation.index'));
//    }
//    return view('welcome');
//});

//Auth::routes();
//Route::group(['middleware' => 'auth'], function () {
//    Route::group(['prefix' => 'storage-locations'], function () {
//        Route::get('/',[StorageLocationController::class,'index'])->name('storageLocation.index');
//        Route::get('create',[StorageLocationController::class,'create'])->name('storageLocation.create');
//        Route::get('{id}/edit',[StorageLocationController::class,'edit'])->name('storageLocation.edit');
//        Route::post('/',[StorageLocationController::class,'store'])->name('storageLocation.store');
//        Route::patch('{id}/update',[StorageLocationController::class,'update'])->name('storageLocation.update');
//        Route::delete('{id}/destroy',[StorageLocationController::class,'destroy'])->name('storageLocation.destroy');
//
//        Route::group(['prefix' => '/{storageLocation}'], function () {
//            Route::get('evidences/',[EvidenceController::class,'index'])->name('evidences');
//            Route::get('evidences/create',[EvidenceController::class,'create'])->name('evidences.create');
//            Route::get('evidences/{id}/edit',[EvidenceController::class,'edit'])->name('evidences.edit');
//            Route::post('evidences',[EvidenceController::class,'store'])->name('evidences.store');
//            Route::patch('evidences/{id}/update',[EvidenceController::class,'update'])->name('evidences.update');
//            Route::delete('evidences/{id}/destroy',[EvidenceController::class,'destroy'])->name('evidences.destroy');
//        });
//    });

//    Route::get('staff',[EmployeeController::class,'index'])->name('staff.index');
//    Route::get('staff/create',[EmployeeController::class,'create'])->name('staff.create');
//    Route::get('staff/{id}/edit',[EmployeeController::class,'edit'])->name('staff.edit');
//    Route::post('staff',[EmployeeController::class,'store'])->name('staff.store');
//    Route::patch('staff/{id}/update',[EmployeeController::class,'update'])->name('staff.update');
//    Route::delete('staff/{id}/destroy',[EmployeeController::class,'destroy'])->name('staff.destroy');

//});

