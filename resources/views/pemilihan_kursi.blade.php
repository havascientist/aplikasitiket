<form method="POST" action="{{ route('prosesPemilihanKursi') }}">
    @csrf

    <!-- Loop untuk menampilkan pilihan kursi -->
    @foreach ($availableSeats as $seat)
        <label for="kursi_{{ $seat->id }}">
            <input type="checkbox" name="selectedSeats[]" id="kursi_{{ $seat->id }}" value="{{ $seat->id }}">
            {{ $seat->nomor_kursi }}
        </label>
    @endforeach

    <button type="submit">Pilih Kursi</button>
</form>
