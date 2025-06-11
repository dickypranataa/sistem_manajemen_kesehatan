@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Profil</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('dokter.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Telepon</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('dokter.profile.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection