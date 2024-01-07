<!-- hasil_tiket.blade.php -->
@extends('layouts.main')

@section('container')
<div class="bg" style="height: 100vh">
    <div class="atas text-center">
        <h4>Congratulations! You have successfully booked tickets</h4>
        <p style="font-size: 12px">Please carry ERS / VRM / SMS / Mail sent to your contact details, along with a relevant ID proof while traveling</p>
    </div>

    <div class="bawah p-5 mx-5 d-flex justify-content-between">
        <div class="qr" style="width: 23%">
            <img src="{{ asset('img/qr.png') }}" alt="" width="250" height="250">
            <div class="text-center p-2 rounded-1 fs-6 mt-4 align-items-center" style="background-color: #C90022; color: white">Download</div>
        </div>

        <div class="data-kanan">
            <div class="mt-4">
                <div class="nama">Nama / Name:</div>
                <div class="text fw-bold">{{ $transaction->passenger->nama }}</div>
            </div>
            <div class="mt-4">
                <div class="noId">No identitas / ID Number:</div>
                <div class="text fw-bold">{{ $transaction->passenger->no_identitas }}</div>
            </div>
            <div class="mt-4">
                <div class="bookCode">Kode booking / Booking Code:</div>
                <div class="text fw-bold">34521687826</div>
            </div>
            <div class="mt-4">
                <div class="asal">Berangkat / Departure:</div>
                <div class="text fw-bold">{{ $transaction->tiket->asal }}</div>
            </div>
        </div>

        <div class="data-kiri">
            <div class="mt-4">
                <div class="nama">Tipe penumpang / Pax Type:</div>
                <div class="text fw-bold">Umum</div>
            </div>
            <div class="mt-4">
                <div class="noId">No tempat duduk / Seat Number:</div>
                <div class="text fw-bold">{{ $transaction->seat->nomor_kursi}}</div>
            </div>
            <div class="mt-4">
                <div class="bookCode">Kereta api / Train:</div>
                <div class="text fw-bold">Kereta Cepat Jakarta Bandung</div>
            </div>
            <div class="mt-4">
                <div class="asal">Perkiraan tiba / ETA:</div>
                <div class="text fw-bold">{{ $transaction->tiket->tujuan }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
