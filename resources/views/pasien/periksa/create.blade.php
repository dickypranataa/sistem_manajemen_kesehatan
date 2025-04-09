<form method="POST" action="{{ route('periksa.store') }}">
    @csrf

    {{-- Nama Pasien (auto dari login) --}}
    <div class="mb-3">
        <label for="nama_pasien" class="form-label">Nama Pasien</label>
        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
    </div>

    {{-- Pilih Dokter --}}
    <div class="mb-3">
        <label for="dokter_id" class="form-label">Pilih Dokter</label>
        <select name="dokter_id" id="dokter_id" class="form-select" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach ($dokter as $d)
            <option value="{{ $d->id }}">{{ $d->name }} - {{ $d->email }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>