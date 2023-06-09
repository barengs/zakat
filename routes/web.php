<?php

use App\Http\Controllers\HitungZakatController;
use App\Http\Controllers\InfoZakatController;
use App\Http\Controllers\KategoriZakatController;
use App\Http\Controllers\SatuanController;
use App\Models\KategoriZakat;
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
})->name('dashboard');

Route::get('/zakat/hitung', [HitungZakatController::class, 'index'])->name('hitung.zakat');
Route::get('/zakat/{id}/hitung', [HitungZakatController::class, 'show'])->name('hitung.show');
Route::get('/zakat', [KategoriZakatController::class, 'index'])->name('zakat.index');
Route::get('/zakat/tambah', [KategoriZakatController::class, 'create'])->name('zakat.tambah');
Route::post('/zakat/store', [KategoriZakatController::class, 'store'])->name('zakat.store');
Route::get('/zakat/edit/{id}', [KategoriZakatController::class, 'edit'])->name('zakat.edit');
Route::put('/zakat/edit/{id}', [KategoriZakatController::class, 'update'])->name('zakat.update');
Route::delete('/zakat/{id}', [KategoriZakatController::class, 'destroy'])->name('zakat.delete');

Route::get('/zakat-info', [InfoZakatController::class, 'index'])->name('info.index');

Route::resource('satuan', SatuanController::class);
