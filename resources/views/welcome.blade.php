@extends('layouts.frontend')

@section('title', 'Dashboard Pengguna')

@section('content')
    {{-- CSS untuk Animasi dan Styling Modern --}}
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #00C6FF 0%, #0072FF 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.18);
        }

        .glass-effect {
            background: var(--glass-bg);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .hero-gradient-text {
            background: linear-gradient(135deg, #0072FF 0%, #0072FF 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: bold;
            text-shadow: 0 2px 4px rgb(0, 47, 255);
        }

        .hero-description {
            background: linear-gradient(135deg, #0072FF 0%, #0072FF 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 500;
            text-shadow: 0 2px 4px rgb(0, 47, 255);
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .scale-in {
            animation: scaleIn 0.5s ease-in-out;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .card {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .card:hover::before {
            opacity: 0.1;
        }

        .section-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem 0;
            background: rgba(255, 255, 255, 0.95);
        }

        .section-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: var(--primary-gradient);
            opacity: 0.1;
            animation: rotate 15s linear infinite;
            z-index: 0;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .btn-modern {
            background: var(--primary-gradient);
            border: none;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 114, 255, 0.3);
        }

        .btn-modern::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            opacity: 0.2;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .btn-modern:hover::after {
            transform: translateX(0);
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 350px !important;
            }

            .display-4 {
                font-size: 2rem !important;
            }

            .lead {
                font-size: 1rem !important;
            }

            .section-container {
                padding: 1rem;
                margin: 1rem 0;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                min-height: 300px !important;
            }

            .display-4 {
                font-size: 1.75rem !important;
            }
        }
    </style>

    {{-- HERO SECTION --}}
    <div class="hero-section mb-4 fade-in"
         style="background-image: url('{{ asset('images/Mockup Himsi.jpg') }}'); background-size: cover; background-position: center; min-height: 500px; display: flex; align-items: center; justify-content: center; position: relative;">
        <div class="glass-effect" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
        <div class="container text-center" style="position: relative; z-index: 1;">
            <h1 class="display-4 hero-gradient-text mb-4 floating" style="font-size: 3.5rem;">SYSTEMA HIMSI</h1>
            <p class="hero-description mb-4">Platform digital karya mahasiswa Sistem Informasi Telkom University Jakarta. Temukan produk menarik seperti merchandise, makanan, dan minuman.</p>
            <a href="#produk" class="btn btn-modern scale-in">Lihat Produk</a>
        </div>
    </div>

    {{-- PRODUK SECTION --}}
    <div id="produk" class="container mt-5">
        <div class="section-container slide-up">
            <h2 class="text-center gradient-text mb-4">PRODUK</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @forelse ($products as $product)
                    <div class="col">
                        <div class="card h-100 glass-effect scale-in">
                            <div class="position-relative">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}"
                                     class="card-img-top"
                                     alt="{{ $product->name }}"
                                     style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title gradient-text">{{ $product->name }}</h5>
                                <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada produk yang tersedia.</p>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('produk.detail')}}" class="btn btn-modern scale-in">Detail Produk</a>
            </div>
        </div>
    </div>

    {{-- KELUARGA HIMSI SECTION --}}
    <div class="container mt-5">
        <div class="section-container slide-up">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="badge bg-primary text-white mb-2 floating" style="font-size: 0.9rem;">TENTANG KAMI</span>
                    <h2 class="gradient-text mb-3">KELUARGA HIMSI</h2>
                    <p class="mb-4" style="font-size: 1rem; color: #37393b;">
                        HIMSI adalah organisasi mahasiswa Sistem Informasi yang berfokus pada pengembangan potensi, aspirasi, dan kolaborasi antar mahasiswa dalam suasana yang profesional dan inovatif.
                    </p>
                    <a href="{{route('about')}}" class="btn btn-modern scale-in">READ MORE</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="glass-effect rounded overflow-hidden">
                                <img src="{{ asset('images/Sertijab.jpg') }}" class="img-fluid scale-in" alt="Kegiatan HIMSI" style="height: 220px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="glass-effect rounded overflow-hidden">
                                <img src="{{ asset('images/Hambali.jpg') }}" class="img-fluid scale-in" alt="Kegiatan HIMSI" style="height: 160px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="glass-effect rounded overflow-hidden">
                                <img src="{{ asset('images/Simfoni.jpeg') }}" class="img-fluid scale-in" alt="Kegiatan HIMSI" style="height: 160px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- REVIEW PRODUK SECTION --}}
    <div class="container mt-5 mb-5">
        <div class="section-container slide-up">
            <h2 class="text-center gradient-text mb-2">REVIEW PRODUK</h2>
            <p class="text-center mb-4" style="font-size: 1rem; color: #37393b;">Testimoni Dari Pelanggan Kami</p>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @forelse ($latest_reviews as $review_item)
                <div class="col">
                    <div class="card h-100 glass-effect scale-in">
                        <div class="card-body text-center d-flex flex-column">
                            <p class="fw-bold mb-1 gradient-text" style="font-size: 1.1rem;">
                                {{ $review_item->user->name ?? 'Pengguna' }} - {{ $review_item->produk->name ?? 'Produk Tidak Diketahui' }}
                            </p>
                            <p class="mb-3" style="font-size: 0.95rem; flex-grow: 1;">
                                "{{ \Illuminate\Support\Str::limit($review_item->review, 120) }}"
                            </p>
                            <div class="mt-auto">
                                @if ($review_item->rating)
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review_item->rating)
                                            <span style="color: #FFD700;" class="floating">&#9733;</span>
                                        @else
                                            <span style="color: #e0e0e0;">&#9733;</span>
                                        @endif
                                    @endfor
                                    <span class="text-muted" style="font-size: 0.9rem;">({{ number_format($review_item->rating, 1) }})</span>
                                @else
                                    <span class="text-muted" style="font-size: 0.9rem;">Belum ada rating</span>
                                @endif
                            </div>
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
