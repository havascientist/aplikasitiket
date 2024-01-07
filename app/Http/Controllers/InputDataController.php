<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

    use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    

    public function inputData(Request $request)
{
    // Validasi formulir
    // $validator = Validator::make($request->all(), [
    //     'tiket_id' => 'required|numeric',
    //     'asal' => 'required|string',
    //     'tujuan' => 'required|string',
    //     'kategori' => 'required|string',
    //     'tanggal' => 'required|date',
    //     'jam_berangkat' => 'required|date_format:H:i', // Assuming the time format is 24-hour
    //     'harga' => 'required|numeric',
    // ]);

    // // Jika validasi gagal, kembalikan response dengan pesan error
    // if ($validator->fails()) {
    //     return redirect()->back()
    //         ->withErrors($validator)
    //         ->withInput();
    // }
    

    // Retrieve jumlah penumpang from the session
    $jumlahPenumpang = Session::get('jumlahPenumpang', 0);

    $penumpang = [
        'jenis_identitas' => $request->input('tipe'),
        'no_identitas' => $request->input('noId'),
        'nama' => $request->input('name'),
        'email' => $request->input('email'),
        'no_hp' => $request->input('noHp'),
        'alamat' => $request->input('alamat'),
        // ... informasi lain yang dibutuhkan
    ];
    
    Session::put('penumpang', $penumpang);

    // Simpan data tiket yang dipilih dan jumlah penumpang ke dalam session
    $selectedTiket = [
        'id' => $request->input('tiket_id'),
        'asal' => $request->input('asal'),
        'tujuan' => $request->input('tujuan'),
        'kategori' => $request->input('kategori'),
        'tanggal' => $request->input('tanggal'),
        'jam_berangkat' => $request->input('jam_berangkat'),
        'harga' => $request->input('harga'),
        'total_harga' => $request->input('total_harga'),
        'jumlah_penumpang' => $jumlahPenumpang,
        // tambahkan informasi lain yang dibutuhkan
    ];

    Session::put('selectedTiket', $selectedTiket);

    // Jika Anda ingin menampilkan pesan sukses, tambahkan pesan di sini
    return redirect()->route('pemilihanKursi');
}

}
