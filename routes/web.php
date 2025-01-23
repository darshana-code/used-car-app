<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CarController::class, 'index'])->name('home');
Route::get('/manufacturer/{id}', [ManufacturerController::class, 'show'])->name('manufacturer.show');
Route::get('/search', [CarController::class, 'search'])->name('search');
