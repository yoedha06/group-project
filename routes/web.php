<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/HasilPemilih', [HasilPemilihanController::class, 'index'])->name('hasilpemilihan');
// Route::get('/HasilPemilih', [HasilPemilihanController::class, 'create'])->name('hasilpemilihan');
// Route::post('/HasilPemilih', [HasilPemilihanController::class, 'store'])->name('createhasilpemilihan');

Route::prefix('hasilpemilihan')->group(function () {
    Route::get('/', [HasilPemilihanController::class, 'index'])->name('hasilpemilihan.index');
    Route::get('/create', [HasilPemilihanController::class, 'create'])->name('hasilpemilihan.create');
    Route::post('/store', [HasilPemilihanController::class, 'store'])->name('hasilpemilihan.store');
    Route::get('/edit/{id}', [HasilPemilihanController::class, 'edit'])->name('hasilpemilihan.edit');
    Route::post('/update/{id}', [HasilPemilihanController::class, 'update'])->name('hasilpemilihan.update');
    Route::get('/delete/{id}', [HasilPemilihanController::class, 'delete'])->name('hasilpemilihan.delete');
});
