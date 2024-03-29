<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\PartaiPolitikController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\HasilPemilihanController;
use App\Http\Controllers\HistoryController;
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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister']);
Route::get('/', [PemilihController::class, 'tampil'])->name('dashboard');
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'doLogin');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


//history
// Route::resource('history', HistoryController::class);
// Route::get('/history/index/{latitude?}/{longitude?}', [HistoryController::class, 'index'])->name('history.index');
// Route::get('/history/create', [HistoryController::class, 'create'])->name('history.create');
// Route::post('/history/store', [HistoryController::class, 'store'])->name('history.store');
Route::get('/history/map', [HistoryController::class, 'map'])->name('history.map');

Route::get('/home', [PemilihController::class, 'home'])->name('home');

Route::resource('history', HistoryController::class)->except('show');

// CRUD Pemilih
Route::get('/lokasi/{latitude?}/{longitude?}', [PemilihController::class, 'showMap'])->name('lokasi');

Route::get('pemilih/index', [PemilihController::class, 'index'])->name('pemilih.index');
Route::get('pemilih/tambah', [PemilihController::class, 'create'])->name('pemilih.create');
Route::post('pemilih/index/store', [PemilihController::class, 'store'])->name('pemilih.store');
Route::get('pemilih/{Id_Pemilihan}/edit', [PemilihController::class, 'edit'])->name('pemilih.edit');
Route::post('pemilih/{Id_Pemilihan}', [PemilihController::class, 'update'])->name('pemilih.update');
Route::delete('pemilih/{Id_Pemilihan}', [PemilihController::class, 'delete'])->name('pemilih.delete');
Route::get('/pemilih/search', [PemilihController::class, 'search'])->name('pemilih.search');
Route::get('/pemilih/map', [PemilihController::class, 'showmap'])->name('pemilih.map');
Route::delete('delete-all', [PemilihController::class, 'removeMulti']);

    
//Partai Politik
Route::get('/partai_politik', [PartaiPolitikController::class, 'index'])->name('partai_politik.index');
Route::get('/partai_politik/create', [PartaiPolitikController::class, 'create'])->name('partai_politik.create');
Route::post('partai_politik/store', [PartaiPolitikController::class, 'store'])->name('partai_politik.store');
Route::get('partai_politik/{Id_Partai}/edit', [PartaiPolitikController::class, 'edit'])->name('partai_politik.edit');
Route::put('partai_politik/{Id_Partai}', [PartaiPolitikController::class, 'update'])->name('partai_politik.update');
Route::delete('partai_politik/delete/{Id_Partai}', [PartaiPolitikController::class, 'delete'])->name('partai_politik.delete');
Route::get('/partai-politik/search', [PartaiPolitikController::class, 'search'])->name('partai_politik.search');

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
    Route::get('/hasilpemilihan/search', [HasilPemilihanController::class, 'search'])->name('hasilpemilihan.search');
});
