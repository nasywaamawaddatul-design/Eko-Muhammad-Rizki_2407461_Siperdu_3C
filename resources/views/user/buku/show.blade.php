
@extends('layout.admin')

@section('title', 'Detail Buku')
@section('subtitle', 'Informasi lengkap buku')

@section('content')
    <div class="table-card-custom text-start">
        <table class="table">
            <tr>
                <th width="200">Judul</th>
                <td>{{ $buku->judul }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $buku->kategori->nama_kategori }}</td>
            </tr>
            <tr>
                <th>Penulis</th>
                <td>{{ $buku->penulis }}</td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <td>{{ $buku->penerbit }}</td>
            </tr>
            <tr>
                <th>Tahun Terbit</th>
                <td>{{ $buku->tahun_terbit }}</td>
            </tr>
            <tr>
                <th>Stok</th>
                <td>{{ $buku->stok }}</td>
            </tr>
        </table>

        <a href="{{ route('admin.buku.index') }}"
           class="btn-custom btn-custom-secondary">
            Kembali
        </a>
    </div>
@endsection
