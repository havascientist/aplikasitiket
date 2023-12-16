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
            <form method="POST" action="{{ route('login') }}">
                @csrf

            <div class="text">Depan</div>
            <div>
                <div class="seat">
                    <input type="hidden" id="A1" name="A1" value="A1">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A2" name="A2" value="A2">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A3" name="A3" value="A3">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A4" name="A4" value="A4">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A5" name="A5" value="A5">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A6" name="A6" value="A6">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A7" name="A7" value="A7">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A8" name="A8" value="A8">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A9" name="A9" value="A9">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A10" name="A10" value="A10">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A11" name="A11" value="A11">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="A12" name="A12" value="A12">
                  </div>
                {{--
            </div> --}}
            {{-- <div> --}}
                <div class="seat">
                    <input type="hidden" id="B1" name="B1" value="B1">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B2" name="B2" value="B2">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B3" name="B3" value="B3">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B4" name="B4" value="B4">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B5" name="B5" value="B5">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B6" name="B6" value="B6">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B7" name="B7" value="B7">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B8" name="B8" value="B8">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B9" name="B9" value="B9">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="B10" name="B10" value="B10">
                  </div>
                  
                {{--
            </div> --}}
            {{-- <div> --}}
                <div class="seat">
                    <input type="hidden" id="C1" name="C1" value="C1">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C2" name="C2" value="C2">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C3" name="C3" value="C3">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C4" name="C4" value="C4">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C5" name="C5" value="C5">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C6" name="C6" value="C6">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C7" name="C7" value="C7">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C8" name="C8" value="C8">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C9" name="C9" value="C9">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="C10" name="C10" value="C10">
                  </div>
                  
                {{--
            </div> --}}
            {{-- <div> --}}
                <div class="seat">
                    <input type="hidden" id="D1" name="D1" value="D1">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D2" name="D2" value="D2">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D3" name="D3" value="D3">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D4" name="D4" value="D4">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D5" name="D5" value="D5">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D6" name="D6" value="D6">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D7" name="D7" value="D7">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D8" name="D8" value="D8">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D9" name="D9" value="D9">
                  </div>
                  <div class="seat">
                    <input type="hidden" id="D10" name="D10" value="D10">
                  </div>
                  
            </div>
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
            <h3 class="fw-bold">Rabu, 12 Desember 2023</h3>
            <h5 class="fw-light">First Class - Kursi A6</h5>
            <p class="fw-light">1 Dewasa</p>
        </div>

        <div class="jalan px-4 d-flex justify-content-between">
            <div class="asal">
                <div class="fw-bold fs-4">Jakarta</div>
                <p class="fs-5 fw-light">16.00
                    <br>12 Des 2023
                </p>
            </div>

            <div class="icon"><img src="img/swap.svg" alt=""></div>

            <div class="tujuan">
                <div class="fw-bold fs-4">Bandung</div>
                <p class="fs-5 fw-light">17.40
                    <br>12 Des 2023
                </p>
            </div>
        </div>

        <div class="text-center fw-light mb-2">Total <span class="fw-bold">Rp. 300.000</span></div>
        <button class="btn fs-5 w-100 rounded-5 mb-2" style="background-color: #C90022; color:#FFFFFF" type="submit">Lanjutkan ke
            pembayaran</button>
        <button class="btn fs-5 w-100 rounded-5" style="background-color: #C90022; color:#FFFFFF">Batalakan
            Pemesanan</button>

        </form>
    </div>
</div>
@endsection