<?php

use App\Http\Controllers\PemilihController;
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

