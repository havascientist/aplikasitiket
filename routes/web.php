<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiketController;
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
// Route::get('/search', 'TicketController@search');

// Route::post('/cari', [TiketController::class, 'cari'])->name('cari.tiket');

Route::post('/hasil-pencarian', [TiketController::class, 'hasilPencarian'])->name('hasil.pencarian');   

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('uhuy');
});
Route::get('/find', function () {
    return view('find');
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
