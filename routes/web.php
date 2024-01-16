<?php

use App\Http\Controllers\PemilihController;
use App\Http\Controllers\PartaiPolitikController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\HasilPemilihanController;
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

// CRUD Pemilih
Route::get('/',[PemilihController::class, 'index'])->name('pemilih.index');
Route::get('pemilih/tambah', [PemilihController::class, 'create'])->name('pemilih.create');
Route::post('pemilih/index', [PemilihController::class, 'store'])->name('pemilih.store');
Route::get('pemilih/{Id_Pemilihan}/edit', [PemilihController::class, 'edit'])->name('pemilih.edit');
Route::post('pemilih/{Id_Pemilihan}', [PemilihController::class, 'update'])->name('pemilih.update');
Route::delete('pemilih/{Id_Pemilihan}', [PemilihController::class, 'delete'])->name('pemilih.delete');
     

//Partai Politik
Route::get('/partai_politik', [PartaiPolitikController::class, 'index'])->name('partai_politik.index');
Route::get('/partai_politik/create', [PartaiPolitikController::class, 'create'])->name('partai_politik.create');
Route::post('partai_politik/store', [PartaiPolitikController::class, 'store'])->name('partai_politik.store');
Route::get('partai_politik/{Id_Partai}/edit', [PartaiPolitikController::class, 'edit'])->name('partai_politik.edit');
Route::put('partai_politik/{Id_Partai}', [PartaiPolitikController::class, 'update'])->name('partai_politik.update');
Route::delete('partai_politik/delete/{Id_Partai}', [PartaiPolitikController::class, 'delete'])->name('partai_politik.delete');

//Kandidat
Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
Route::get('/kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
Route::post('/kandidat/store', [KandidatController::class, 'store'])->name('kandidat.store');
Route::get('/kandidat/edit/{id}', [KandidatController::class, 'edit'])->name('kandidat.edit');
Route::post('/kandidat/update/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
Route::delete('/kandidat/destroy{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
Route::get('/kandidat/search', [KandidatController::class, 'search'])->name('kandidat.search');


Route::prefix('hasilpemilihan')->group(function () {
    Route::get('/', [HasilPemilihanController::class, 'index'])->name('hasilpemilihan.index');
    Route::get('/create', [HasilPemilihanController::class, 'create'])->name('hasilpemilihan.create');
    Route::post('/store', [HasilPemilihanController::class, 'store'])->name('hasilpemilihan.store');
    Route::get('/edit/{id}', [HasilPemilihanController::class, 'edit'])->name('hasilpemilihan.edit');
    Route::post('/update/{id}', [HasilPemilihanController::class, 'update'])->name('hasilpemilihan.update');
    Route::get('/delete/{id}', [HasilPemilihanController::class, 'delete'])->name('hasilpemilihan.delete');
});
