<!-- hasil_tiket.blade.php -->
@extends('layouts.main')
@section('container')

<div class="bg" style="height: 100vh">

  <div class="atas text-center">
    <h4 class="text-center">Congratulations! You have successfully booked tickets</h4>
    <p style="font-size: 12px">please carry ERS / VRM / SMS / Mail sent to your contact details, along with a relavant ID proof while travelling</p>
  </div>

  <div class="bawah p-5 mx-5 d-flex justify-content-between">

    <div class="qr" style="width: 23%">
      <img src="{{ asset('img/qr.png') }}" alt="" width="250" height="250">

      <div class="text-center p-2 rounded-1 fs-6 mt-4 align-items-center" style="background-color: #C90022 ; color: white">Downdload</div>
    </div>

    
    <div class="data-kanan">

      <div class="nama mt-4 ">
        Nama / name
        <div class="text fw-bold"> {{ $transaction->passenger->nama }} </div>
      </div>
      <div class="noId mt-4 ">
        No identitas / id number
        <div class="text fw-bold"> {{ $transaction->passenger->no_identitas }} </div>
      </div>
      <div class="bookCode mt-4 ">
        Kodebooking / booking code
        <div class="text fw-bold"> 34521687826 </div>
      </div>
      <div class="asal mt-4 ">
        Berangkat / departure
        <div class="text fw-bold"> {{ $transaction->tiket->asal }} </div>
      </div>
    </div>

    <div class="data-kiri">

      <div class="nama mt-4 ">
        Tipe penumpang / pax type
        <div class="text fw-bold">Umum</div>
      </div>
      <div class="noId mt-4 ">
        No tempat duduk / seat number
        <div class="text fw-bold"> {{ $transaction->seat->nomor_kursi}} </div>
      </div>
      <div class="bookCode mt-4 ">
        Kereta api / train
        <div class="text fw-bold">Kereta Cepat Jakarta Bandung</div>
      </div>
      <div class="asal mt-4 ">
        Perkiraan tiba / eta
        <div class="text fw-bold"> {{ $transaction->tiket->tujuan }}</div>
      </div>
    </div>



  </div>

</div>

{{-- <h2>Hasil Tiket</h2>

<div>
    <h4>Nama Penumpang: {{ $transaction->passenger->nama }}</h4>
    <p>No Identitas: {{ $transaction->passenger->no_identitas }}</p>
    <p>No Tempat Duduk: {{ $transaction->seats_id }}</p>
    <p>Asal: {{ $transaction->tiket->asal }}</p>
    <p>Tujuan: {{ $transaction->tiket->tujuan }}</p>
    <!-- Tambahkan informasi lainnya yang perlu ditampilkan -->
</div> --}}

@endsection
