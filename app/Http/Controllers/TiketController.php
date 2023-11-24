<?php

namespace App\Http\Controllers;

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

    public function getData(){
        $data = Tiket::all();
        return Datatables::of($data)->make(true);
    }

    public function hasilPencarian(Request $request)
    {

        // Ambil nilai dari form
        $asal = $request->input('dariMana');
        $tujuan = $request->input('keMana');
        $tanggal = $request->input('tanggal');
        // $jumlahPenumpang = $request->input('jumlahPenumpang');

        $hasilPencarian = DB::table('tiket')
            ->where('asal', $asal)
            ->where('tujuan', $tujuan)
            ->where('tanggal', $tanggal)
            // ->take($jumlahPenumpang)
            ->get();
        return view('result', compact('hasilPencarian'));
    }



    // public function hasil()
    // {
    //     return view('result');
    // }
    // public function hasilPencarian(Request $request)
    // {
    //     $asal = $request->input('dariMana');
    //     $tujuan = $request->input('keMana');
    //     $tanggal = $request->input('tanggal');

    //     $query = DB::table('tiket')
    //         ->where('asal', $asal)
    //         ->where('tujuan', $tujuan)
    //         ->where('tanggal', $tanggal);

    //     return DataTables::of($query)->make(true);
    // }

    public function show(Tiket $tiket)
    {
        return view('editTiket', compact('tiket'));
    }

    public function update(Request $request, Tiket $tiket) //controller buat edit
    {
    $request->validate([
        'stok' => 'required|numeric',
    ]);
    
    // Perbarui data koleksi dengan data yang dikirimkan dari formulir
    
    $affacted = DB::table('tiket')->where('id', $request->id)->update([
        'stok' => $request->stok,
    ]
    );
    // Redirect ke halaman yang sesuai, misalnya, halaman daftar koleksi
    return redirect()->route('daftartiket')->with('success', 'Tiket berhasil diperbarui.');
    }

}
