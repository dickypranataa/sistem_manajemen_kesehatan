@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Selamat Datang')
@section('content_header_title', 'Poliklinik UDINUS')


{{-- Content body --}}
@section('content_body')
<div class="card">
    <div class="card-body text-center">
        <h2 class="mb-4">Selamat Datang di Poliklinik UDINUS</h2>
        <p class="lead">
            Sistem ini digunakan untuk mengelola data pemeriksaan pasien, dokter, dan obat-obatan di lingkungan Poliklinik UDINUS.
        </p>
        <img src="https://dinus.ac.id/wp-content/uploads/2023/11/LogoUdinus.png" alt="Logo UDINUS" height="150" class="mt-4" />
    </div>
</div>
@stop

{{-- Push extra CSS --}}
@push('css')
{{-- Tambahkan gaya khusus jika diperlukan --}}
<style>
    .card {
        background-color: #f8fafc;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

{{-- Push extra JS --}}
@push('js')
<script>
    console.log("Welcome to Poliklinik UDINUS!");
</script>
@endpush