@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Dashboard Pasien</h5>
                </div>
                <div class="card-body">

                    <div class="alert alert-info">
                        Halo, {{ auth()->user()->name }}! Selamat datang di halaman pasien.
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Profil Anda</h5>
                                    <p class="card-text mb-0"><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                                    <p class="card-text mb-0"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                                    <p class="card-text"><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Periksa</h5>
                                    <p class="card-text">Lihat riwayat pemeriksaan Anda dan hasilnya.</p>
                                    <a href="{{ route('pasien.riwayat.index') }}" class="btn btn-light btn-sm">
                                        Lihat Riwayat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p class="text-muted mb-0">Jika Anda memiliki keluhan baru, silakan hubungi pihak klinik atau dokter melalui layanan yang tersedia.</p>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection