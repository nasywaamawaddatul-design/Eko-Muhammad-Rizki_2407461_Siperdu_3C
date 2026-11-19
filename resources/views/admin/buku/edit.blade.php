@extends('layout.admin')

@section('title', 'Edit Buku')
@section('subtitle', 'Perbarui informasi buku')

@section('content')
    <div class="text-start">
        <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.buku._form')

            <div class="d-flex gap-2">
                <button type="submit" class="btn-custom btn-custom-primary">
                    <i class="bi bi-check-lg"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.buku.index') }}" class="btn-custom btn-custom-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
