@extends('layouts.frontend')
@section('title', 'Semua Review Produk')

@section('content')
<div class="review-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Semua Review Produk</h1>
            <div class="hero-line"></div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        {{-- ====> TOMBOL TAMBAH REVIEW BARU <==== --}}
        @auth
        <div class="action-wrapper">
            <a href="{{ route('review.create') }}" class="add-review-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Tulis Review Baru</span>
            </a>
        </div>
        @else
        <div class="login-alert">
            <i class="fas fa-info-circle"></i>
            <p>Untuk menulis review, silakan <a href="{{ route('login') }}">login</a> terlebih dahulu.</p>
        </div>
        @endauth

        <div class="row g-4">
            @forelse($reviews as $review_item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="review-card">
                    <div class="review-image-wrapper">
                        @if ($review_item->produk && $review_item->produk->image)
                            <img src="{{ asset('storage/' . $review_item->produk->image) }}"
                                 class="review-image"
                                 alt="{{ $review_item->produk->name }}">
                        @else
                            <img src="{{ asset('images/default-product.png') }}"
                                 class="review-image"
                                 alt="Default Image">
                        @endif
                        <div class="image-overlay"></div>
                    </div>
                    <div class="review-content">
                        <h3 class="product-name">{{ $review_item->produk->name ?? 'Produk Tidak Diketahui' }}</h3>
                        <div class="rating-wrapper">
                            <div class="rating">
                                <span class="rating-value">{{ $review_item->rating }}</span>
                                <span class="rating-max">/5</span>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="reviewer">
                                <i class="fas fa-user"></i>
                                <span>{{ $review_item->user->name ?? 'Pengguna' }}</span>
                            </div>
                        </div>
                        <p class="review-text">{{ Str::limit($review_item->review, 100, "...") }}</p>
                        <a href="{{ route('review.show', $review_item->id) }}" class="detail-btn">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-comment-slash"></i>
                    <p>Belum ada review.</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="pagination-wrapper">
            {{ $reviews->links() }}
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .review-page {
        background: #f8f9fa;
        min-height: 100vh;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        padding: 60px 0;
        margin-bottom: 40px;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.05)"/></svg>');
        background-size: 20px 20px;
        opacity: 0.5;
        animation: moveBackground 20s linear infinite;
    }

    @keyframes moveBackground {
        from { background-position: 0 0; }
        to { background-position: 40px 40px; }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .hero-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(-20px);
        animation: fadeInDown 0.8s ease forwards;
    }

    .hero-line {
        width: 80px;
        height: 4px;
        background: #ffc107;
        margin: 20px auto;
        transform: scaleX(0);
        animation: expandLine 0.8s ease forwards 0.4s;
    }

    /* Main Content */
    .main-content {
        padding: 40px 0;
    }

    /* Action Button */
    .action-wrapper {
        margin-bottom: 30px;
    }

    .add-review-btn {
        display: inline-flex;
        align-items: center;
        padding: 12px 25px;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        border-radius: 50px;
        color: white;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0,47,255,0.2);
        transition: all 0.3s ease;
    }

    .add-review-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,47,255,0.3);
        color: white;
    }

    .add-review-btn i {
        margin-right: 8px;
        font-size: 1.2rem;
    }

    /* Login Alert */
    .login-alert {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        background: white;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .login-alert i {
        font-size: 1.2rem;
        color: #0072FF;
        margin-right: 10px;
    }

    .login-alert a {
        color: #002fff;
        text-decoration: none;
        font-weight: 600;
    }

    .login-alert a:hover {
        text-decoration: underline;
    }

    /* Review Card */
    .review-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .review-image-wrapper {
        position: relative;
        padding-top: 60%;
        overflow: hidden;
    }

    .review-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.3) 100%);
    }

    .review-card:hover .review-image {
        transform: scale(1.1);
    }

    .review-content {
        padding: 20px;
    }

    .product-name {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .rating-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .rating-value {
        font-size: 1.2rem;
        font-weight: 700;
        color: #002fff;
    }

    .rating-max {
        color: #666;
    }

    .rating i {
        color: #ffc107;
    }

    .reviewer {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #666;
    }

    .review-text {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #002fff;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .detail-btn:hover {
        color: #0072FF;
    }

    .detail-btn:hover i {
        transform: translateX(5px);
    }

    .detail-btn i {
        transition: transform 0.3s ease;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }

    .empty-state i {
        font-size: 3rem;
        color: #002fff;
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }

    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes expandLine {
        from { transform: scaleX(0); }
        to { transform: scaleX(1); }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 40px 0;
        }

        .hero-title {
            font-size: 1.8rem;
        }

        .review-card {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 30px 0;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .add-review-btn span {
            display: none;
        }

        .add-review-btn i {
            margin: 0;
        }

        .review-content {
            padding: 15px;
        }

        .product-name {
            font-size: 1.1rem;
        }

        .rating-wrapper {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>
@endsection
