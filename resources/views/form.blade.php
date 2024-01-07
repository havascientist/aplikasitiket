@php
    $selectedTiket = session('selectedTiket');
    $formattedDate = \Carbon\Carbon::parse($selectedTiket['tanggal'])->format('l, d F Y');
@endphp


@extends('layouts.main')
@section('container')
<!-- Content -->
<div class="bg d-flex p-5">
    <div class="kiri" style="width: 70%">
        <div class="atas mb-2">
            <div class="rounded-top fs-5 p-2 text-center"
                style="background-color: #C90022; color: white; max-width: 5em">
                Detail
            </div>
            <div class="ounded-end text-center" style="background-color: #C90022; color: #C90022">
                outline
            </div>
            <div class="header p-2" style="background-color: #FFFFFF">
                <h1 class="fs-5">Bandung Jakarta Intercity Rails</h1>
                <p style="color: #808080;">{{ $formattedDate }} -<span style="color: #000000;">{{ $selectedTiket['kategori'] }}</span></p>
            </div>
        </div>



        <div class="bawah">
            <div class="rounded-top fs-6 p-2" style="background-color: #C90022; color: white;">
                Detail Penumpang
            </div>
            <div class="header p-3" style="background-color: #FFFFFF">
                {{-- <h1 class="fs-6 mb-4">Penumpang {{ $selectedTiket['jumlahPenumpang'] }}: Dewasa</h1> --}}
                <form method="POST" action="{{ route('processInputData') }}">
                    @csrf
                    <!-- Tambahkan input hidden untuk ID tiket -->
                    <input type="hidden" name="tiket_id" value="{{ $selectedTiket['id'] }}">
                    <input type="hidden" name="asal" value="{{ $selectedTiket['asal'] }}">
                    <input type="hidden" name="tujuan" value="{{ $selectedTiket['tujuan'] }}">
                    <input type="hidden" name="kategori" value="{{ $selectedTiket['kategori'] }}">
                    <input type="hidden" name="tanggal" value="{{ $selectedTiket['tanggal'] }}">
                    <input type="hidden" name="jam_berangkat" value="{{ $selectedTiket['jam_berangkat'] }}">
                    <input type="hidden" name="jumlahPenumpang" value="{{ $selectedTiket['jumlahPenumpang'] }}">
                    <input type="hidden" name="harga" value="{{ $selectedTiket['harga'] }}">
                    <input type="hidden" name="total_harga" value="{{ $selectedTiket['harga'] * $selectedTiket['jumlahPenumpang'] }}">

                    @for ($i = 1; $i <= $selectedTiket['jumlahPenumpang']; $i++)
                    <h1 class="fs-6 mb-4"> Penumpang {{ $i }}</h1>
                    <div class="form d-flex mb-4">
                        <div class="form-left" style="width: 50%">
                            <div class="mb-3 mx-5">
                                <img src="img/id.png" alt="">
                                <label for="tipe" class="form-label">Tipe identitas</label>
                                <select class="form-select custom-input-size" id="tipe" name="tipe" required>
                                    <option value="ktp">KTP</option>
                                    <option value="passport">Passport</option>
                                </select>
                            </div>

                            <div class="mb-3 mx-5">
                                <img src="img/id.png" alt="">
                                <label for="noId" class="form-label">No identitas</label>
                                <input type="number" class="form-control custom-input-size" id="noId" name="noId"
                                    placeholder="No Identitas sesuai NIK/paspor" required>
                            </div>


                            <div class="mb-3 mx-5">
                                <img src="img/usr.png" alt="">
                                <label for="name" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nama Pemesan sesuai NIK/paspor " required>
                            </div>

                            <div class="mb-3 mx-5">
                                <img src="img/Email.png" alt="">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="contoh@gmail.com" required>
                            </div>
                        </div>
                        <div class="form-right" style="width: 50%">
                            <div class="mb-3 mx-3">
                                <img src="img/telp.png" alt="">
                                <label for="noHp" class="form-label">No Handphone</label>
                                <input type="number" class="form-control" id="noHp" name="noHp"
                                    placeholder="08xxxxxxxxx" required>
                            </div>

                            <div class="mb-3 mx-3">
                                <img src="img/lok.png" alt="">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Nama Daerah" required>
                            </div>

                        </div>
                    </div>
                    @endfor

            </div>
        </div>
    </div>

    {{-- end kiri --}}

    <div class="kanan mt-5 mx-4" style="width: 30%; color: black;">
        <div class="card mb-2">
            <div class="card-body">
                <h1 class="fs-5">Bandung Jakarta Intercity Rails</h1>
                <p style="font-size: 13px" style="color:#808080">{{ $formattedDate }} - {{ $selectedTiket['kategori'] }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div class="text-kelas" style="color: #808080">First Class 2</div>
                <div class="text-harga">{{ $selectedTiket['harga'] }}</div> 
            </div>
        </div>

        <div class="card p-3" style="background-color: #FFFFFF">
            <div class="text fs-6 mb-4">
                Harga tiket untuk {{ $selectedTiket['jumlahPenumpang'] }} orang dewasa
            </div>

             <h3>Total Rp. {{ $selectedTiket['harga'] * $selectedTiket['jumlahPenumpang'] }}</h3>

            <button class="btn" style="background-color: #C90022; color:#FFFFFF" type="submit">Lanjutkan pemilihan
                kursi</button>
        </div>
    </form>
    </div>




</div>



@endsection