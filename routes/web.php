<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\PemilihanKursiController;
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
Route::get('/daftartiket', [TiketController::class, 'index'])->name('daftartiket');
Route::get('/daftar-pencarian', [TiketController::class, 'hasil'])->name('daftarHasil');
Route::get('/getData', [TiketController::class, 'getData'])->name('tiket.getData');
Route::get('/editTiket/{tiket}', [TiketController::class, 'show'])->name('tiket.editTiket');
Route::put('/updateTiket', [TiketController::class, 'update'])->name('tiket.update');



Route::get('/pemilihan-kursi', [PemilihanKursiController::class, 'showPemilihanKursi'])->name('pemilihanKursi');
Route::post('/pemilihan-kursi', [PemilihanKursiController::class, 'prosesPemilihanKursi'])->name('prosesPemilihanKursi');
// Route::get('/search', 'TicketController@search');

// Route::post('/cari', [TiketController::class, 'cari'])->name('cari.tiket');

Route::post('/hasil-pencarian', [TiketController::class, 'hasilPencarian'])->name('hasil.pencarian');   
Route::GET('/pilih-tiket/{id}', [TiketController::class, 'pilihtiket'])->name('pilihTiket');
Route::post('/input-data', [InputDataController::class, 'inputData'])->name('processInputData'); 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('uhuy');
});
Route::get('/find', function () {
    return view('find')->name('find');
});

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/seat', function () {
    return view('pilih-kursi');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
