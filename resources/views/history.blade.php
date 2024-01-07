<!-- resources/views/tickets/index.blade.php -->
@extends('layouts.main')

@section('container')
@if($transactions->isEmpty())
    <div class="bg" style="height: 100vh">
        <h2 class="mb-2 p-3">Transaction History</h2>
        <p>No transaction history available.</p>
    </div>
@else
    <div class="bg">
        <h2 class="mb-2 p-3">Transaction History</h2>
        <div class="card-list p-3 rounded-pill">
            @foreach($transactions as $transaction)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Transaction Date: {{ $transaction->created_at->format('M d, Y H:i A') }}</h5>
                        <p class="card-text">Origin: {{ $transaction->tiket->asal }}</p>
                        <p class="card-text">Destination: {{ $transaction->tiket->tujuan }}</p>
                        <a href="{{ route('tiket.detail', ['id' => $transaction->id]) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection
