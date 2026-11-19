@extends('layout.admin')

@section('title', 'Detail Buku')
@section('subtitle', 'Informasi lengkap buku')

@section('content')
    <div class="table-card-custom text-start">
        <div class="row g-4 align-items-center">
            <div class="col-md-4">
                @if ($buku->cover)
                    <img
                        src="{{ asset('storage/' . $buku->cover) }}"
                        alt="{{ $buku->judul }}"
                        class="img-fluid rounded"
                    >
                @else
                    <p class="text-muted">Belum ada cover buku.</p>
                @endif
            </div>

            <div class="col-md-8">
                <h3>{{ $buku->judul }}</h3>

                <p><strong>Kategori:</strong> {{ $buku->kategori->nama_kategori }}</p>
                <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                <p><strong>Stok:</strong> {{ $buku->stok }}</p>

                @if ($buku->stok > 0)
                    <span class="badge-table success">Tersedia</span>
                @else
                    <span class="badge-table failed">Habis</span>
                @endif

                <div class="mt-4">
                    <a href="{{ route('admin.buku.index') }}"
                       class="btn-custom btn-custom-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection