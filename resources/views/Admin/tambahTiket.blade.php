

@extends('layouts.admin')
@section('container')
    <!-- Content -->
    <!-- Content -->
  <div class="container">
     
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1 class="text">Daftar Tiket</h1>
    <p>Di sini, Anda dapat melihat, mengedit, atau menghapus daftar tiket yang tersedia.</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Tiket Baru</button>
   <table id="myTable" class="display" style="color: aliceblue">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
  </div>

  <!-- Modal Tambah Tiket Baru -->
  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="{{ route('tiket.addTiket') }}" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahLabel">Tambah Tiket Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            @csrf
            @method("POST")
            <div class="form-group">
              <label for="asal">Asal</label>
              <input type="text" class="form-control" id="asal" name="asal" placeholder="Masukkan asal tiket">
            </div>
            <div class="form-group">
              <label for="tujuan">Tujuan</label>
              <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan tujuan tiket">
            </div>
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <select class="form-control" id="kategori" name="kategori">
                <option>Ekonomi</option>
                <option>Bisnis</option>
                <option>Eksekutif</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal tiket">
            </div>
            <div class="form-group">
              <label for="jam">Jam Berangkat</label>
              <input type="time" class="form-control" id="jam" name="jam_berangkat" placeholder="Masukkan jam berangkat tiket">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga tiket dalam satuan rupiah">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn" style="background-color: brown; color:aliceblue">Simpan</button>
        </div>
      </form>
    </div>
  </div>


  {{-- tampil daftar tiket admin --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('tiket.getData') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'asal', name: 'asal' },
                { data: 'tujuan', name: 'tujuan' },
                { data: 'kategori', name: 'kategori' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'jam_berangkat', name: 'jam_berangkat' },
                { data: 'harga', name: 'harga' },
                {
                    data: null,
                    render: function (data) {
                        return `
                        <a href='{{ route('tiket.updatetiket', '')}}` + "/" + data.id + `'><i class="bi bi-pencil-square"></i></a>
                        <form action='{{ route('tiket.deletetiket', '')}}` + "/" + data.id + `' method="POST"> @csrf @method("DELETE") <button type="submit" class="btn"><i class="bi bi-trash"></i></button></form>
                        `;
                    },
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>

  
@endsection
