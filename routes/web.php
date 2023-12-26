<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
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

// Location Routes

Route::controller(LocationController::class)->group(function(){
    Route::get('/locations', 'index')->name('locations.index');
    Route::get('/locations/create', 'create')->name('locations.create');
    Route::post('/locations', 'store')->name('locations.store');
    Route::get('/locations/{id}', 'show')->name('locations.show');
    Route::get('/locations/{id}/edit', 'edit')->name('locations.edit');
    Route::put('/locations/{id}', 'update')->name('locations.update');
    Route::delete('/locations/{id}', 'destroy')->name('locations.destroy');
});

// Bus Routes

Route::controller(BusController::class)->group(function(){
    Route::get('/buses', 'index')->name('buses.index');
    Route::get('/buses/create', 'create')->name('buses.create');
    Route::post('/buses', 'store')->name('buses.store');
    Route::get('/buses/{id}', 'show')->name('buses.show');
    Route::get('/buses/{id}/edit', 'edit')->name('buses.edit');
    Route::put('/buses/{id}', 'update')->name('buses.update');
    Route::delete('/buses/{id}', 'destroy')->name('buses.destroy');
});
