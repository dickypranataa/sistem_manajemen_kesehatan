@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Riwayat Pemeriksaan Pasien: {{ $pasien->name }}</h3>

    <div class="mb-3">
        <strong>Alamat:</strong> {{ $pasien->alamat ?? '-' }}<br>
        <strong>No. KTP:</strong> {{ $pasien->no_ktp ?? '-' }}<br>
        <strong>No. Telepon:</strong> {{ $pasien->no_hp ?? '-' }}<br>
        <strong>No. RM:</strong> {{ $pasien->no_rm ?? '-' }}
    </div>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Periksa</th>
                <th>Nama Dokter</th>
                <th>Keluhan</th>
                <th>Catatan</th>
                <th>Obat</th>
                <th>Biaya Periksa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayatList as $index => $riwayat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $riwayat->tanggal_periksa ?? '-' }}</td>
                <td>{{ $riwayat->daftarPoli->dokter->name ?? '-' }}</td>
                <td>{{ $riwayat->keluhan ?? '-' }}</td>
                <td>{{ $riwayat->catatan ?? '-' }}</td>
                <td>
                    @if($riwayat->obat->count())
                    <ul>
                        @foreach($riwayat->obat as $obat)
                        <li>
                            {{ $obat->name_obat }}
                            (Rp {{ number_format($obat->pivot->harga, 0, ',', '.') }})
                        </li>
                        @endforeach
                    </ul>
                    @else
                    Tidak ada obat
                    @endif
                </td>

                <td>Rp {{ number_format($riwayat->total_harga ?? 0, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada riwayat periksa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('dokter.riwayat.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection