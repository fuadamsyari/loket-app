<?php

use App\Http\Controllers\AntreanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('guest');
// Rute Loket
Route::get('/loket', [LoketController::class, 'index'])->name('loket')->middleware('guest');
Route::post('/loket/pilih', [LoketController::class, 'pilihLoket'])->name('loket.pilih');
// Rute Antrean
Route::get('/antrean', [AntreanController::class, 'index'])->name('antrean')->middleware('auth');
Route::get('/antrean/next', [AntreanController::class, 'nextAntrean'])->name('antrean.next')->middleware('auth');
Route::get('/antrean/pref', [AntreanController::class, 'prefAntrean'])->name('antrean.pref')->middleware('auth');;
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);



// akhir
