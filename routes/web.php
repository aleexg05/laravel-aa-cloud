<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EsdevenimentsController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth','auth'])->group(function () {
 
    Route::get('/esdeveniments/index', [EsdevenimentsController::class, 'getindex'])->name('esdeveniments.index');
    Route::get('/esdeveniments/show/{id?}', [EsdevenimentsController::class, 'show'])->name('esdeveniments.show');
    Route::get('/esdeveniments/edit/{id?}', [EsdevenimentsController::class, 'edit'])->name('esdeveniments.edit');
    Route::get('/esdeveniments/{id}/reserva', [EsdevenimentsController::class, 'reserva'])->name('esdeveniments.reserva');
    Route::get('/esdeveniments/create', [EsdevenimentsController::class, 'create'])->name('esdeveniments.create');
    Route::get('/esdeveniments/{id}', [EsdevenimentsController::class, 'show']);
    Route::post('/esdeveniments', [EsdevenimentsController::class, 'store'])->name('esdeveniments.store');
    Route::put('/esdeveniments/update/{id}', [EsdevenimentsController::class, 'update'])->name('esdeveniments.update');
    Route::get('/esdeveniments/edit/{id?}', [EsdevenimentsController::class, 'edit'])->name('esdeveniments.edit');
    Route::delete('/esdeveniments/{id}', [EsdevenimentsController::class, 'destroy'])->name('esdeveniments.destroy');
    Route::get('/esdeveniments/index', [EsdevenimentsController::class, 'countUsuari'])->name('esdeveniments.index');
   Route::post('/esdeveniments/{id}/guardarReserva', [EsdevenimentsController::class, 'guardarReserva'])->name('esdeveniments.guardarReserva');


  
    Route::get('/dashboard', function () {
        return view('dashboard');   
    })->name('dashboard');
});
require __DIR__.'/auth.php';
