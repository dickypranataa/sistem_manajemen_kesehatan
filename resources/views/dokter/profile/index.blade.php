@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Profil Saya</h3>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $user->no_hp }}</p>
            <a href="{{ route('dokter.profile.edit') }}" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>
</div>
@endsection