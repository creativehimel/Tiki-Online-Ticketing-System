<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::controller(TripController::class)->group(function(){
    Route::get('/trips', 'index')->name('trips.index');
    Route::get('/trips/create', 'create')->name('trips.create');
    Route::post('/trips', 'store')->name('trips.store');
    Route::get('/trips/{id}', 'show')->name('trips.show');
    Route::get('/trips/{id}/edit', 'edit')->name('trips.edit');
    Route::put('/trips/{id}', 'update')->name('trips.update');
    Route::delete('/trips/{id}', 'destroy')->name('trips.destroy');
});
