@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
<h1>Dashboard Admin</h1>
@stop

@section('content')
<div class="row">
    <!-- Kartu Jumlah Dokter -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $dokterCount }}</h3>
                <p>Jumlah Dokter</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-md"></i>
            </div>
            <a href="{{ route('admin.dokter.index') }}" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Kartu Jumlah Pasien -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $pasienCount }}</h3>
                <p>Jumlah Pasien</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.pasien.index') }}" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Kartu Jumlah Poli -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $poliCount }}</h3>
                <p>Jumlah Poli</p>
            </div>
            <div class="icon">
                <i class="fas fa-hospital"></i>
            </div>
            <a href="{{ route('admin.poli.index') }}" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Kartu Jumlah Obat -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $obatCount }}</h3>
                <p>Jumlah Obat</p>
            </div>
            <div class="icon">
                <i class="fas fa-pills"></i>
            </div>
            <a href="{{ route('admin.obat.index') }}" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@stop