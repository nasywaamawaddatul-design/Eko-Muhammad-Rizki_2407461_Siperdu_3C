@extends('layout.user')

@section('title', 'Katalog Buku')

@section('content')
    <section class="section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2>Katalog Buku</h2>
            <p>Temukan berbagai koleksi buku yang tersedia di perpustakaan kami.</p>
        </div>
    </div>
</section>
    <div class="row g-4">
        @forelse ($buku as $item)
            <div class="col-md-4 col-lg-3">
                <div class="table-card-custom h-100 text-start">
                    @if ($item->cover)
                        <img
                            src="{{ asset('storage/' . $item->cover) }}"
                            alt="{{ $item->judul }}"
                            class="img-fluid rounded mb-3"
                            style="width: 100%; height: 220px; object-fit: cover;"
                        >
                    @else
                        <div class="bg-light rounded mb-3 d-flex align-items-center justify-content-center"
                             style="height: 220px;">
                            <span class="text-muted">Belum ada cover</span>
                        </div>
                    @endif

                    <h5>{{ $item->judul }}</h5>
                    <p class="text-muted mb-1">{{ $item->penulis }}</p>
                    <p class="mb-1">
                        Kategori: {{ $item->kategori->nama_kategori }}
                    </p>
                    <p class="mb-0">Stok: {{ $item->stok }}</p>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada buku yang tersedia.</p>
            </div>
        @endforelse
    </div>
@endsection