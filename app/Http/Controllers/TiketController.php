<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Models\Tiket;
use App\Models\Transaction;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
class TiketController extends Controller
{
    public function index()
    {
        return view('daftarTiket');
    }

    public function hasilTiket($transactionId)
{
    $transaction = Transaction::with(['passenger', 'seat', 'tiket'])->find($transactionId);

    // if (!$transaction) {
    //     // Handle transaksi tidak ditemukan
    //     // Misalnya, tampilkan pesan error atau redirect ke halaman lain
    // }

    return view('hasil_tiket', ['transaction' => $transaction]);
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
    // Pengecekan apakah pengguna sudah login
    if (!auth()->check()) {
        // Jika belum login, arahkan ke halaman login dengan pesan peringatan
        return redirect()->route('login')->with('warning', 'Anda harus login terlebih dahulu.');
    }

    // Dapatkan informasi tiket dari database berdasarkan ID
    $selectedTiket = Tiket::find($id);

    // Periksa apakah tiket ditemukan
    if (!$selectedTiket) {
        // Handle jika tiket tidak ditemukan, misalnya, redirect ke halaman lain atau tampilkan pesan kesalahan
        return redirect()->route('halaman_lain')->with('error', 'Tiket tidak ditemukan.');
    }

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



    public function getTiket(){
        $data = Tiket::all();
        return Datatables::of($data)->make(true);
    }

    public function history()
    {
        // Get the currently logged-in user
       // Get the currently logged-in user
        // $user = Auth::user();
        $user = auth()->user();

        // Fetch transactions associated with the user
        $transactions = $user->transactions()->get();

        // Pass the transactions to the view
        return view('history', compact('transactions'));
    }

    public function detailTiket($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('detailTiket', compact('transaction'));
    }

    public function viewAddTiket() {
        return view('admin.tambahTiket');
    }

    public function addTiket(Request $request) {
        $data = $request->validate([
            "asal" => "required",
            "tujuan" => "required",
            "kategori" => "required",
            "tanggal" => "required",
            "jam_berangkat" => "required",
            "harga" => "required",
        ]);
        
        Tiket::create($data);
        
        return back();
    }
    
    public function updateTiket(Request $request, Tiket $tiket) {
        $data = $request->validate([
            "asal" => "required",
            "tujuan" => "required",
            "kategori" => "required",
            "tanggal" => "required",
            "jam_berangkat" => "required",
            "harga" => "required",
        ]);

        $tiket->update($data);

        return redirect()->route("tiket.viewTiket");
    }

    public function edittiket(Tiket $tiket) {
        return view("admin.editTiket", ["tiket" => $tiket]);
    }

    public function deletetiket(Tiket $tiket) {
        $tiket->delete();
        return back();
    }
}
