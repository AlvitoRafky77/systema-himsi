@extends('layouts.frontend')

@section('title', 'Selamat Datang di Systema HIMSI')

@section('content')

    {{-- HERO SECTION --}}
    <div class="hero-section text-white mb-4"
         style="background-image: url('{{ asset('images/Mockup Himsi.jpg') }}'); background-size: cover; background-position: center; min-height: 500px; display: flex; align-items: center; justify-content: center; position: relative;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);"></div>
        <div class="container text-center" style="position: relative; z-index: 1;">
            <h1 class="display-4 fw-bold">SYSTEMA HIMSI</h1>
            <p class="lead">Platform digital karya mahasiswa Sistem Informasi Telkom University Jakarta. Temukan produk menarik seperti merchandise, makanan, dan minuman.</p>
            <a href="#produk" class="btn btn-warning btn-lg mt-3">Lihat Produk</a>
        </div>
    </div>

    {{-- PRODUK SECTION --}}
    <div id="produk" class="container mt-5">
        <div class="p-4" style="background-color: #c6e7ff; border: 2px solid #E0E0E0; border-radius: 16px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 class="text-center fw-bold mb-4">PRODUK KAMI</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($products as $product)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada produk yang tersedia.</p>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('produk.detail')}}" class="btn btn-sm btn-outline-primary" style="font-size: 1.25rem; font-weight: bold;">Detail Produk</a>
            </div>
        </div>
    </div>

    {{-- KELUARGA HIMSI SECTION --}}
    <div class="mt-5">
        <hr>
        <div class="container py-5" style="background-color: #c6e7ff; border-radius: 16px; max-width: 1100px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <span class="badge bg-danger text-white mb-2" style="font-size: 0.9rem;">TENTANG KAMI</span>
                    <h2 class="fw-bold mb-3">KELUARGA HIMSI</h2>
                    <p style="font-size: 1rem; color: #37393b;">
                        HIMSI adalah organisasi mahasiswa Sistem Informasi yang berfokus pada pengembangan potensi, aspirasi, dan kolaborasi antar mahasiswa dalam suasana yang profesional dan inovatif.
                    </p>
                    <a href="{{route('about')}}" class="btn btn-outline-primary mt-3">READ MORE</a>
                </div>
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <img src="{{ asset('images/Sertijab.jpg') }}" class="img-fluid rounded shadow-sm" alt="Kegiatan HIMSI" style="height: 220px; object-fit: cover; width: 100%;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('images/Hambali.jpg') }}" class="img-fluid rounded shadow-sm" alt="Kegiatan HIMSI" style="height: 160px; object-fit: cover; width: 100%;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('images/Simfoni.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Kegiatan HIMSI" style="height: 160px; object-fit: cover; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- REVIEW PRODUK SECTION --}}
    <div class="mt-5">
        <hr>
        <div class="container py-5" style="background-color: #c6e7ff; border-radius: 16px; max-width: 1100px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 class="text-center fw-bold mb-2" style="font-size: 2rem;">REVIEW PRODUK</h2>
            <p class="text-center mb-4" style="font-size: 1rem; color: #37393b;">Testimoni Dari Pelanggan Kami</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                {{-- Loop melalui data $latest_reviews yang dikirim dari controller/route --}}
                @forelse ($latest_reviews as $review_item)
                <div class="col">
                    <div class="card h-100 shadow-sm" style="border-radius: 12px;">
                        <div class="card-body text-center d-flex flex-column">
                            <p class="fw-bold mb-1" style="font-size: 1.1rem;">
                                {{ $review_item->user->name ?? 'Pengguna' }} - {{ $review_item->produk->name ?? 'Produk Tidak Diketahui' }}
                            </p>

                            <p class="mb-3" style="font-size: 0.95rem; flex-grow: 1;">
                                "{{ \Illuminate\Support\Str::limit($review_item->review, 120) }}"
                            </p>

                            <div class="mt-auto">
                                @if ($review_item->rating)
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review_item->rating)
                                            <span style="color: #FFD700;">&#9733;</span>{{-- Bintang Terisi --}}
                                        @else
                                            <span style="color: #e0e0e0;">&#9733;</span>{{-- Bintang Kosong --}}
                                        @endif
                                    @endfor
                                    <span class="text-muted" style="font-size: 0.9rem;">({{ number_format($review_item->rating, 1) }})</span>
                                @else
                                    <span class="text-muted" style="font-size: 0.9rem;">Belum ada rating</span>
                                @endif
                            </div>
                            {{-- Opsional: Tampilkan nama produk yang direview --}}
                            {{-- <p class="text-muted small mt-2">Produk: {{ $review_item->product->name ?? '-' }}</p> --}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center text-muted fst-italic">Belum ada review untuk ditampilkan.</p>
                </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection
