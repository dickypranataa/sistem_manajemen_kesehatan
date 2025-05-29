@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Periksa Pasien: {{ $periksa->pasien->name }}</h3>
    <form method="POST" action="{{ route('dokter.periksa.update', $periksa->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" class="form-control" value="{{ $periksa->pasien->name }}" disabled>
        </div>

        <div class="mb-3">
            <label>Tanggal Periksa</label>
            <input type="date" name="tanggal_periksa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Catatan / Keluhan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Obat</label>
            <select name="obat_id[]" id="obat-select" class="form-control" multiple>
                @foreach($obatList as $obat)
                <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                    {{ $obat->name_obat }} - Rp {{ number_format($obat->harga, 0, ',', '.') }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Periksa</label>
            <input type="text" id="harga-periksa" class="form-control" value="Rp 150.000" disabled>
            <input type="hidden" name="total_harga" id="total_harga" value="150000">
        </div>

        <button type="submit" class="btn btn-success">Simpan Pemeriksaan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const obatSelect = document.getElementById('obat-select');
        const hargaPeriksaInput = document.getElementById('harga-periksa');
        const totalHargaHidden = document.getElementById('total_harga');

        const hargaDasar = 150000;

        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function updateHarga() {
            let totalObat = 0;

            // Loop pilihan obat yang dipilih
            for (let option of obatSelect.selectedOptions) {
                const hargaObat = parseInt(option.dataset.harga);
                if (!isNaN(hargaObat)) {
                    totalObat += hargaObat;
                }
            }

            const total = hargaDasar + totalObat;

            hargaPeriksaInput.value = formatRupiah(total);
            totalHargaHidden.value = total; // untuk submit ke backend
        }

        // Event listener ketika pilihan obat berubah
        obatSelect.addEventListener('change', updateHarga);

        // Init harga saat halaman load (jika ada obat yang sudah dipilih)
        updateHarga();
    });
</script>
@endsection