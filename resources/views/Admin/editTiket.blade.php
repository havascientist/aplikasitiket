@extends('layouts.admin')

@section('container')
<div class="bg">
<div class="container" style="height: 100vh">
  
  <h1 class="mb-3 mb-">Edit Tiket</h1>
    <form action="{{ route('tiket.updateTiket', $tiket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
              <label for="asal">Asal</label>
              <input type="text" class="form-control" value="{{$tiket->asal}}" id="asal" name="asal" placeholder="Masukkan asal tiket">
            </div>
            <div class="form-group">
              <label for="tujuan">Tujuan</label>
              <input type="text" class="form-control" value="{{$tiket->tujuan}}" id="tujuan" name="tujuan" placeholder="Masukkan tujuan tiket">
            </div>
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <select class="form-control" value="{{$tiket->kategori}}" id="kategori" name="kategori">
                <option>Ekonomi</option>
                <option>Bisnis</option>
                <option>Eksekutif</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" class="form-control" value="{{$tiket->tanggal}}" id="tanggal" name="tanggal" placeholder="Masukkan tanggal tiket">
            </div>
            <div class="form-group">
              <label for="jam">Jam Berangkat</label>
              <input type="time" class="form-control" value="{{$tiket->jam_berangkat}}" id="jam" name="jam_berangkat" placeholder="Masukkan jam berangkat tiket">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" value="{{$tiket->harga}}" id="harga" name="harga" placeholder="Masukkan harga tiket dalam satuan rupiah">
            </div> 
        <button type="submit" class="btn mt-4" style="background-color: black; color: white;">Edit Tiket</button>
    </form>
</div>
</div>
@endsection