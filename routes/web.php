<?php

use App\Http\Controllers\HitungZakatController;
use App\Http\Controllers\KategoriZakatController;
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

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::get('/zakat/hitung', [HitungZakatController::class, 'index'])->name('hitung.zakat');
Route::get('/zakat', [KategoriZakatController::class, 'index'])->name('zakat.index');
Route::get('/zakat/tambah', [KategoriZakatController::class, 'create'])->name('zakat.tambah');