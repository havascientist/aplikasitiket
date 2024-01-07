@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembelian produk <strong>{{ $transaction['name'] }}</strong> dengan harga
                <strong>Rp{{ number_format($transaction['total_harga'], 0, ',', '.') }}</strong>
                <button class="btn fs-5 w-100 rounded-5 mb-2" style="background-color: #C90022; color:#FFFFFF"
                    id="pay-button" type="submit">Lanjutkan ke pembayaran
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            // Check if $transaction is defined before using it
            var snapToken = '{{ isset($transaction) ? optional($transaction)->snap_token : null }}';
            
            if (snapToken) {
                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        // You may add your own JavaScript code here for success
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onPending: function(result) {
                        // You may add your own JavaScript code here for pending
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result) {
                        // You may add your own JavaScript code here for errors
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            } else {
                // Handle the case when snapToken is not available
                alert('Error: Snap Token not available.');
            }
        };
    </script>
@endsection