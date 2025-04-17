@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Daftar Obat')
@section('content_header_title', 'Obat')
@section('content_header_subtitle', 'Tambah dan Lihat Daftar Obat')

@section('content_body')
<div class="card">
    {{-- Tombol untuk menambah obat --}}
    <div class="card-header">
        <a href="{{ route('dokter.obat.create') }}" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Tambah Obat
        </a>
    </div>

    {{-- Tabel Daftar Obat --}}
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Kemasan</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Tanggal Diperbarui</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Data obat yang disimulasikan (static data) --}}
            @foreach ($obat as $o)
            <tr>
                <td> {{ $o->id }}</td>
                <td> {{ $o->name_obat }}</td>
                <td>{{ $o->kemasan }}</td>
                <td>{{ $o->harga }}</td>
                <td>{{ $o->created_at }}</td>
                <td>{{ $o->updated_at }}</td>
                <td>
                    <a href="{{ route('dokter.obat.edit', $o->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action={{ route('dokter.obat.destroy', $o->id) }} method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection