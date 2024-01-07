<!-- resources/views/tickets/index.blade.php -->
@extends('layouts.main')

@section('container')
<div class="bg" style="height: 100vh">
    @if(isset($transaction))
        <div class="ticket-card p-5 mb-4">
            <div class="atas text-center">
                <h4 class="text-center">Congratulations! You have successfully booked tickets</h4>
                <p style="font-size: 12px">Please carry ERS / VRM / SMS / Mail sent to your contact details, along with relevant ID proof while traveling</p>
            </div>

            <div class="bawah p-5 mx-5 d-flex justify-content-between">
                <div class="qr" style="width: 23%">
                    <img src="{{ asset('img/qr.png') }}" alt="" width="250" height="250">

                    <div class="text-center p-2 rounded-1 fs-6 mt-4 align-items-center" style="background-color: #C90022; color: white">Download</div>
                </div>

                <div class="data-kanan">
                    <div class="nama mt-4">
                        Nama / name
                        <div class="text fw-bold"> {{ $transaction->passenger->nama }} </div>
                    </div>
                    <div class="noId mt-4">
                        No identitas / id number
                        <div class="text fw-bold"> {{ $transaction->passenger->no_identitas }} </div>
                    </div>
                    <div class="bookCode mt-4">
                        Kodebooking / booking code
                        <div class="text fw-bold"> 330000101000 </div>
                    </div>
                    <div class="asal mt-4">
                        Berangkat / departure
                        <div class="text fw-bold"> {{ $transaction->tiket->asal }} </div>
                    </div>
                </div>

                <div class="data-kiri">
                    <div class="nama mt-4">
                        Tipe penumpang / pax type
                        <div class="text fw-bold">Umum</div>
                    </div>
                    <div class="noId mt-4">
                        No tempat duduk / seat number
                        <div class="text fw-bold"> {{ $transaction->seat->nomor_kursi}} </div>
                    </div>
                    <div class="bookCode mt-4">
                        Kereta api / train
                        <div class="text fw-bold">Kereta Cepat Jakarta Bandung</div>
                    </div>
                    <div class="asal mt-4">
                        Perkiraan tiba / eta
                        <div class="text fw-bold"> {{ $transaction->tiket->tujuan }}</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h2>List of Tickets</h2>
        @if($transactions->isEmpty())
            <p>No tickets found for the user.</p>
        @else
            <div class="card-list">
                @foreach($transactions as $transaction)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Transaction Date: {{ $transaction->created_at->format('M d, Y H:i A') }}</h5>
                            <p class="card-text">Origin: {{ $transaction->tiket->asal }}</p>
                            <p class="card-text">Destination: {{ $transaction->tiket->tujuan }}</p>

                            <a href="{{ route('tickets.show', ['id' => $transaction->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</div>
@endsection
