<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Seat;
// SeatController.php
// use App\Http\Controllers\App\Models\Transaction;
use App\Models\Passenger;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Illuminate\Http\Request;

class PemilihanKursiController extends Controller
{
    // PemilihanKursiController.php
public function showPemilihanKursi()
{
    $selectedTiket = session('selectedTiket');
    // Ambil data penumpang dari session
    $penumpang = session('penumpang');

    // Ambil daftar kursi yang tersedia dari database
    $availableSeats = Seat::all();

    return view('pemilihan_kursi', compact('penumpang', 'availableSeats'));
}

// public function prosesPemilihanKursi(Request $request)
// {

//     $jumlahPenumpang = Session::get('jumlahPenumpang', 0);
//     $selectedTiket = session('selectedTiket');
//     $penumpang = session('penumpang');
//     $selectedSeats = $request->input('selectedSeats');

//     // Simpan data kursi yang dipilih ke dalam sesi
//     Session::put('selectedSeats', $selectedSeats);
//      // Adjust this based on your form input


//     $passenger = Passenger::create([
//         // 'transaction_id' => $transaction->id,
//         'jenis_identitas' => $penumpang['jenis_identitas'],
//         'no_identitas' => $penumpang['no_identitas'],
//         'nama' => $penumpang['nama'],
//         'email' => $penumpang['email'],
//         'no_hp' => $penumpang['no_hp'],
//         'alamat' => $penumpang['alamat'],
//     ]);
//     // Simpan data ke dalam tabel Transaction
//     $transaction = Transaction::create([
//         'tiket_id' => $selectedTiket['id'],
//         'passengers_id' => $passenger['id'],
//         'seats_id' => $selectedSeats,
//         'total_harga' => $selectedTiket['harga'] * $jumlahPenumpang,
//     ]);

//     // Bersihkan sesi setelah selesai
//     session()->forget(['selectedTiket', 'penumpang', 'selectedSeats']);

//     return redirect()->route('dashboard'); // Ganti dengan rute yang sesuai
// }



public function prosesPemilihanKursi(Request $request)
{
    $jumlahPenumpang = Session::get('jumlahPenumpang', 0);
    $selectedTiket = session('selectedTiket');
    $penumpang = session('penumpang');
    $selectedSeats = $request->input('selectedSeats');

    // Simpan data kursi yang dipilih ke dalam sesi
    Session::put('selectedSeats', $selectedSeats);

    // Simpan data ke dalam tabel Passenger
    $passenger = Passenger::create([
        'jenis_identitas' => $penumpang['jenis_identitas'],
        'no_identitas' => $penumpang['no_identitas'],
        'nama' => $penumpang['nama'],
        'email' => $penumpang['email'],
        'no_hp' => $penumpang['no_hp'],
        'alamat' => $penumpang['alamat'],
    ]);

    // Dapatkan ID passenger yang baru dibuat
    $passengerId = $passenger->id;
    $userId = auth()->id();

    if ($userId == null) {
        return redirect()->route('login')->with('status', 'Silahkan masuk terlebih dahulu');
    }    

    $transaction = Transaction::create([
        'users_id' => $userId,
        'tiket_id' => $selectedTiket['id'],
        'passengers_id' => $passengerId,
        'seats_id' => $selectedTiket['id'],
        'total_harga' => $selectedTiket['total_harga'],
        
    ]);

    $transaction['total_harga'];

    // Bersihkan sesi setelah selesai
    session()->forget(['selectedTiket', 'penumpang', 'selectedSeats']);

    return redirect()->route('hasil_tiket', ['transactionId' => $transaction->id]);
    // return redirect()->route('hasil_tiket'); // Ganti dengan rute yang sesuai
}


}
