@extends('adminlte::page')

@section('title', 'Dashboard Dokter')

@section('content_header')
<h1>Dashboard Dokter</h1>

@stop

@section('content')
<div class="row">

    <!-- Kartu Pasien Diperiksa -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <p>Pasien yang Diperiksa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
            <a href="{{ route('dokter.periksa.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Kartu Jadwal Pemeriksaan -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <p>Jadwal Pemeriksaan</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="{{ route('dokter.jadwal.index') }}" class="small-box-footer">
                Lihat Jadwal <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Kartu Riwayat Pasien -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <p>Riwayat Pasien</p>
            </div>
            <div class="icon">
                <i class="fas fa-history"></i>
            </div>
            <a href="{{ route('dokter.riwayat.index') }}" class="small-box-footer">
                Lihat Riwayat <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@stop