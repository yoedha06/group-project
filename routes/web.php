<?php

use App\Http\Controllers\KandidatController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
Route::get('/kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
Route::post('/kandidat/store', [KandidatController::class, 'store'])->name('kandidat.store');
Route::get('/kandidat/edit/{id}', [KandidatController::class, 'edit'])->name('kandidat.edit');
Route::post('/kandidat/update/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
Route::delete('/kandidat/destroy{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
Route::get('/kandidat/search', [KandidatController::class, 'search'])->name('kandidat.search');
