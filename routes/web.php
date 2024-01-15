<?php

use App\Http\Controllers\PartaiPolitikController;
use App\Models\PartaiPolitik;
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


//Partai Politik
Route::get('/partai_politik', [PartaiPolitikController::class, 'index'])->name('partai_politik.index');
Route::get('/partai_politik/create', [PartaiPolitikController::class, 'create'])->name('partai_politik.create');
Route::post('partai_politik/store', [PartaiPolitikController::class, 'store'])->name('partai_politik.store');
Route::get('partai_politik/{Id_Partai}/edit', [PartaiPolitikController::class, 'edit'])->name('partai_politik.edit');
Route::put('partai_politik/{Id_Partai}', [PartaiPolitikController::class, 'update'])->name('partai_politik.update');
Route::delete('partai_politik/delete/{Id_Partai}', [PartaiPolitikController::class, 'delete'])->name('partai_politik.delete');