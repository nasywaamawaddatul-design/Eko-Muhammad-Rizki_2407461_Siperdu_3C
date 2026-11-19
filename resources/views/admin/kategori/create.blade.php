
@extends('layout.admin')

@section('title', 'Tambah Kategori')
@section('subtitle', 'Tambahkan kategori buku baru')

@section('content')

<div class="table-card-custom">

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">
                Nama Kategori
            </label>

            <input
                type="text"
                name="nama_kategori"
                id="nama_kategori"
                class="form-control @error('nama_kategori') is-invalid @enderror"
                value="{{ old('nama_kategori') }}"
                placeholder="Masukkan nama kategori"
                required
            >

            @error('nama_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan
            </button>

            <a href="{{ route('admin.kategori.index') }}"
               class="btn-custom btn-custom-secondary">
                Kembali
            </a>
        </div>
    </form>

</div>

@endsection
