@extends('layouts.main')
@section('container')
    <!-- Content -->
    <div class="bg d-flex justify-content-center align-items-center">
      <div class="card mx-auto w-50">
          <form action="{{ route('hasil.pencarian') }}" method="post">
              @csrf
              <div class="card-header" style="background-color: #C90022;">
                  <div class="text-center fs-3" style="color: white;">Tiket Kereta</div>
                  <div class="mt-4">
                      <label for="dariMana" class="form-label" style="color: white;">From where</label>
                      <input type="text" class="form-control" id="dariMana" name="dariMana" aria-describedby="emailHelp">
                  </div>
                  <div class="mt-2">
                      <label for="keMana" class="form-label" style="color: white;">To where</label>
                      <input type="text" class="form-control" id="keMana" name="keMana">
                  </div>
              </div>
              <div class="card-body">
                  <div class="mb-1">
                      <label for="tanggal" class="form-label" style="color: black;">Tanggal</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="emailHelp">
                  </div>
                  <div class="mt-3">
                      <label for="jumlahPenumpang" class="form-label" style="color: black;">Jumlah Penumpang</label>
                      <input type="number" class="form-control" id="jumlahPenumpang" name="jumlahPenumpang">
                  </div>
                  <button type="submit" class="btn mt-3" style="background-color: black; color: white;">Cari Tiket</button>
              </div>
          </form>
      </div>
  </div>
  
@endsection