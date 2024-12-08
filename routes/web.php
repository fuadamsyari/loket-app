<?php

use App\Http\Controllers\AntreanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\RegisterController;
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
Route::get('/antrean/{loket_id}', [AntreanController::class, 'index'])->name('antrean');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);



// akhir
