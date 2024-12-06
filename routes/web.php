<?php

use App\Http\Controllers\AntreanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoketController;
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

// Rute Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Loket
Route::get('/loket', [LoketController::class, 'index'])->name('loket');
Route::post('/loket/pilih', [LoketController::class, 'pilihLoket'])->name('loket.pilih');


// Rute Antrean
Route::get('/antrean', [AntreanController::class, 'index'])->name('antrean');


// akhir
