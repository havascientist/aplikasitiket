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
        // $jumlahPenumpang = $request->input('jumlahPenumpang');

        $hasilPencarian = DB::table('tiket')
            ->where('asal', $asal)
            ->where('tujuan', $tujuan)
            ->where('tanggal', $tanggal)
            // ->take($jumlahPenumpang)
            ->get();
        return view('result', compact('hasilPencarian'));
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
