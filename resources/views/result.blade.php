

@extends('layouts.main')

@section('container')
    <div class="bg">
        <div class="p-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-white-900 dark:text-gray-100">
                    <h2>Hasil Pencarian Tiket</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Jam Keberangkatan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hasilPencarian as $tiket)
                                <tr>
                                    <td>{{ $tiket->asal }}</td>
                                    <td>{{ $tiket->tujuan }}</td>
                                    <td>{{ $tiket->kategori }}</td>
                                    <td>{{ $tiket->tanggal }}</td>
                                    <td>{{ $tiket->jam_berangkat }}</td>
                                    <td>{{ $tiket->harga }}</td>
                                    <td>
                                        <a href="{{ route('pilihTiket', ['id' => $tiket->id]) }}" class="btn btn-success">Pilih Tiket</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada hasil pencarian.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- @extends('layouts.main')
@section('container')
<div class="bg">
    <div class="p-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">    
            <div class="p-6 text-white-900 dark:text-gray-100">
                <table id="myTable" class="display" style="color: aliceblue">
                    <thead>
                        <tr>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Jam Keberangkatan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('hasil.pencarian') !!}',
            columns: [
                { data: 'asal', name: 'asal' },
                { data: 'tujuan', name: 'tujuan' },
                { data: 'kategori', name: 'kategori' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'jam_keberangkatan', name: 'jam_keberangkatan' },
                { data: 'harga', name: 'harga' },
                { data: 'stok', name: 'stok' },
                {
                    data: null,
                    render: function (data) {
                        return '<a href="' + "{{ route('tiket.editTiket', '') }}" + '/' + data.id + '"><i class="bi bi-box-arrow-in-up-right"></i></a>';
                    },
                    orderable: false,
                    searchable: false
                }

            ]
        });
    });
</script>
@endsection --}}