@extends('layouts.main')

@section('container')
<div class="container">
    <form action="{{ route('tiket.update', $tiket->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <input type="hidden" name="id" value="{{ $tiket->id }}"/>
        <div class="row form-group mt-2">
            <label class="form-label">ID Tiket</label>
            <input id="idTransaksi" name="idTransaksi" type="text" class="form-control" autocomplete="off" value="{{ $tiket->id }}" readonly>
        </div>
    
        <div class="row form-group mt-2">
            <label class="form-label">Asal</label>
            <input id="idDetailTransaksi" name="idDetailTransaksi" type="text" class="form-control" autocomplete="off" value="{{ $tiket->asal }}" readonly>
        </div>
    
        <div class="row form-group mt-2">
            <label class="form-label">Tujuan</label>
            <input id="idPeminjam" name="idPeminjam" type="text" class="form-control" autocomplete="off" value="{{ $tiket->tujuan }}" readonly>
        </div>
        <div class="row form-group mt-2">
            <label class="form-label">Kategori</label>
            <input id="idPetugas" name="idPetugas" type="text" class="form-control" autocomplete="off" value="{{ $tiket->kategori}}" readonly>
        </div>
        <div class="row form-group mt-2">
            <label class="form-label">Tanggal</label>
            <input id="koleksi" name="koleksi" type="text" class="form-control" autocomplete="off" value="{{ $tiket->tanggal }}" readonly>
        </div>
        <div class="row form-group mt-2">
            <label class="form-label">Jam Keberangkatan</label>
            <input id="koleksi" name="koleksi" type="text" class="form-control" autocomplete="off" value="{{ $tiket->jam_keberangkatan }}" readonly>
        </div>
        <div class="row form-group mt-2">
            <label class="form-label">Harga</label>
            <input id="koleksi" name="koleksi" type="text" class="form-control" autocomplete="off" value="{{ $tiket->harga }}" readonly>
        </div>
    
        <button type="submit" class="btn mt-4" style="background-color: black; color: white;">Edit Tiket</button>
    </form>
</div>

@endsection