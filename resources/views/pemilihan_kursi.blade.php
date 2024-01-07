{{-- <form method="POST" action="{{ route('prosesPemilihanKursi') }}">
    @csrf

    <!-- Loop untuk menampilkan pilihan kursi -->
    @foreach ($availableSeats as $seat)
    <label for="kursi_{{ $seat->id }}">
        <input type="checkbox" name="selectedSeats[]" id="kursi_{{ $seat->id }}" value="{{ $seat->id }}">
        {{ $seat->nomor_kursi }}
    </label>
    @endforeach

    <button type="submit">Pilih Kursi</button>
</form> --}}

@php
$jumlahPenumpang = session('jumlahPenumpang');
$selectedTiket = session('selectedTiket');
$formattedDate = \Carbon\Carbon::parse($selectedTiket['tanggal'])->format('l, d F Y');
@endphp

@extends('layouts.main')
@section('container')



<div class="konten p-5 d-flex justify-content-between"> {{-- d-flex untuk buat 2div dalam 1 div jadi naympingin. display
    flex --}}
    <div class="kiri mx-5" style="width: 54%">
        <h5>Pilih Penumpang</h5>

        <div class="text-center mb-5 mt-4 rounded-pill fw-bold p-2"
            style="width: 25%; background-color: white; color: black">Penumpang 1</div>

        <p class="fw-bold">Pilih Kursi</p>
        <div class="form mb-3 p-3" style="background-color: rgb(255, 255, 255)">
            <form method="POST" action="{{ route('prosesPemilihanKursi') }}">
                @csrf
                <div class="text">Depan</div>
                @foreach ($availableSeats as $seat)
                <div class="seat">
                    <input type="hidden" id="{{ $seat->nomor_kursi }}" name="selectedSeats[]"
                        value="{{ $seat->nomor_kursi }}">
                </div>
                @endforeach
                <div class="text d-flex justify-content-end">Belakang</div>
        </div>

        <div class="bawah d-flex justify-content-between">

            <div class="gerbong" style="width: 55%">
                <label for="tipe" class="form-label">Pilih Gerbong</label>
                <select class="form-select custom-input-size" id="tipe" name="tipe" required>
                    <option value="class1">First Class-1</option>
                    <option value="class2">First Class-2</option>
                </select>
            </div>

            <div class="kursi d-flex gap-4">
                <div class="s1">
                    <div class="seat1"></div>
                    <div class="text-center mt-2">kosong</div>
                </div>
                <div class="s2">
                    <div class="seat2"></div>
                    <div class="text-center mt-2">isi</div>
                </div>
                <div class="s3">
                    <div class="seat3"></div>
                    <div class="text-center mt-2">anda</div>
                </div>
            </div>

        </div>
    </div>
    <div class="kanan p-3" style="width: 35%; background-color:white; color: black">
        <div class="text-center p-3 rounded-1 fs-5" style="background-color: #C90022 ; color: white">Detail Pembayaran
        </div>
        <div class="detail p-4">
            <h3 class="fw-bold fs-5"> {{$formattedDate }}</h3>
            <h5 class="fw-light">{{ $selectedTiket['kategori'] }} - Kursi A6</h5>
            <p class="fw-light">{{ $jumlahPenumpang }} Dewasa</p>
        </div>

        <div class="jalan px-4 d-flex justify-content-between">
            <div class="asal">
                <div class="fw-bold fs-4">{{ $selectedTiket['asal'] }}</div>
                <p class="fs-5 fw-light">{{ $selectedTiket['jam_berangkat'] }}
                    <br>{{$formattedDate }}
                </p>
            </div>

            <div class="icon"><img src="img/swap.svg" alt=""></div>

            <div class="tujuan">
                <div class="fw-bold fs-4">{{ $selectedTiket['tujuan'] }}</div>
                <p class="fs-5 fw-light">{{
                    \Carbon\Carbon::parse($selectedTiket['jam_berangkat'])->addMinutes(30)->format('H:i:s') }}

                    <br>{{$formattedDate }}
                </p>
            </div>
        </div>

        <div class="text-center fw-light mb-2">Total <span class="fw-bold">Rp. {{$selectedTiket['harga']}}</span></div>
        <button class="btn fs-5 w-100 rounded-5 mb-2" style="background-color: #C90022; color:#FFFFFF"
            type="submit">Pilih Kursi</button>
        </form>
        <button class="btn fs-5 w-100 rounded-5" style="background-color: #C90022; color:#FFFFFF" id="cancelBookingBtn">Batalakan Pemesanan</button>
    </div>
</div>


<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('cancelBookingBtn').addEventListener('click', function () {
        // Tampilkan SweetAlert untuk konfirmasi
        Swal.fire({
            title: 'Anda yakin?',
            text: 'Anda akan membatalkan pemesanan. Tindakan ini tidak dapat dibatalkan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, batalkan!'
        }).then((result) => {
            // Jika pengguna menekan "Yes"
            if (result.isConfirmed) {
                // Arahkan ke halaman dashboard
                window.location.href = "{{ route('dashboard') }}";

                // Hapus sesi yang sedang tersimpan (contoh: menggunakan JavaScript)
                // Ganti sesuai dengan sesi yang ingin Anda hapus
                sessionStorage.removeItem('exampleSession');

                // Atau gunakan AJAX untuk menghapus sesi di sisi server
                // Contoh: 
                // fetch('/clear-session', { method: 'POST' });
            }
        });
    });
</script>
@endsection