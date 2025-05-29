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
            <div>
                @foreach($obatList as $obat)
                <div class="form-check">
                    <input
                        class="form-check-input obat-checkbox"
                        type="checkbox"
                        name="obat_id[]"
                        value="{{ $obat->id }}"
                        data-harga="{{ $obat->harga }}"
                        id="obat-{{ $obat->id }}">
                    <label class="form-check-label" for="obat-{{ $obat->id }}">
                        {{ $obat->name_obat }} - Rp {{ number_format($obat->harga, 0, ',', '.') }}
                    </label>
                </div>
                @endforeach
            </div>
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
        const checkboxes = document.querySelectorAll('.obat-checkbox');
        const hargaPeriksaInput = document.getElementById('harga-periksa');
        const totalHargaHidden = document.getElementById('total_harga');

        const hargaDasar = 150000;

        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function updateHarga() {
            let totalObat = 0;

            checkboxes.forEach(chk => {
                if (chk.checked) {
                    const hargaObat = parseInt(chk.dataset.harga);
                    if (!isNaN(hargaObat)) {
                        totalObat += hargaObat;
                    }
                }
            });

            const total = hargaDasar + totalObat;

            hargaPeriksaInput.value = formatRupiah(total);
            totalHargaHidden.value = total; // untuk submit ke backend
        }

        checkboxes.forEach(chk => {
            chk.addEventListener('change', updateHarga);
        });

        updateHarga();
    });
</script>

@endsection