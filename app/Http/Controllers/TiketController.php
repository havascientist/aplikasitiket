<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Tiket;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class TiketController extends Controller
{
    public function index()
    {
        return view('daftarTiket');
    }

    public function getData()
    {
        $data = Tiket::all();
        return Datatables::of($data)->make(true);
    }

    public function hasilPencarian(Request $request)
{
    // Ambil nilai dari form
    $asal = $request->input('dariMana');
    $tujuan = $request->input('keMana');
    $tanggal = $request->input('tanggal');
    $jumlahPenumpang = $request->input('jumlahPenumpang');

    // Simpan jumlah penumpang ke dalam session
    $request->session()->put('jumlahPenumpang', $jumlahPenumpang);

    $hasilPencarian = DB::table('tikets')
        ->where('asal', $asal)
        ->where('tujuan', $tujuan)
        ->where('tanggal', $tanggal)
        ->get();

    return view('result', compact('hasilPencarian'));
}

public function pilihTiket($id)
{
    // Misalnya, dapatkan informasi tiket dari database berdasarkan ID
    $selectedTiket = Tiket::find($id);

    // Ambil jumlah penumpang dari session pencarian sebelumnya
    $jumlahPenumpang = Session::get('jumlahPenumpang', 0);

    // Simpan informasi tiket yang dipilih ke dalam session
    Session::put('selectedTiket', [
        'id' => $selectedTiket->id,
        'asal' => $selectedTiket->asal,
        'tujuan' => $selectedTiket->tujuan,
        'kategori' => $selectedTiket->kategori,
        'tanggal' => $selectedTiket->tanggal,
        'jam_berangkat' => $selectedTiket->jam_berangkat,
        'harga' => $selectedTiket->harga,
        'jumlahPenumpang' => $jumlahPenumpang,
        // tambahkan informasi lain yang dibutuhkan
    ]);

    return redirect()->route('form');
}

    public function hasilPencarianAPI(Request $request)
    {
        $asal = $request->input('dariMana');
        $tujuan = $request->input('keMana');
        $tanggal = $request->input('tanggal');

        $hasilPencarian = DB::table('tiket')
            ->where('asal', $asal)
            ->where('tujuan', $tujuan)
            ->where('tanggal', $tanggal)
            ->get();


        return response()->json(['data' => $hasilPencarian], 200);
    }

    public function show(Tiket $tiket)
    {
        return view('editTiket', compact('tiket'));
    }

    public function update(Request $request, Tiket $tiket)
    {
        $request->validate([
            'stok' => 'required|numeric',
        ]);

        $affected = DB::table('tiket')
            ->where('id', $request->id)
            ->update([
                'stok' => $request->stok,
            ]);

        return redirect()->route('daftartiket')->with('success', 'Tiket berhasil diperbarui.');
    }
}
