@extends('layouts.frontend')

@section('title', 'Detail Review')

@section('content')
<div class="review-detail-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Detail Review</h1>
            <div class="hero-line"></div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        @if (isset($review) && $review)
            <div class="review-card">
                <div class="user-info">
                    <div class="avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h3>{{ $review->user->name ?? 'Pengguna' }}</h3>
                        <span class="review-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $review->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>

                <div class="product-info">
                    <i class="fas fa-box-open product-icon"></i>
                    <h4>{{ $review->produk->name ?? 'Produk Tidak Diketahui' }}</h4>
                </div>

                <div class="rating-display">
                    <div class="rating-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="rating-text">{{ $review->rating }}/5</span>
                </div>

                <div class="review-content">
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p>{{ $review->review }}</p>
                    <i class="fas fa-quote-right quote-icon"></i>
                </div>

                <div class="button-group">
                    <a href="{{ url()->previous() }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                    @if(isset($review->product))
                        <a href="{{ route('review.create', ['product' => $review->product->id]) }}" class="write-review-btn">
                            <i class="fas fa-pen"></i>
                            <span>Tulis Review</span>
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="not-found-card">
                <i class="fas fa-search"></i>
                <h2>Review Tidak Ditemukan</h2>
                <a href="{{ url()->previous() }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        @endif
    </div>
</div>

<style>
    /* Base Styles */
    .review-detail-page {
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

    /* Review Card */
    .review-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards 0.2s;
    }

    /* User Info */
    .user-info {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }

    .avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .avatar i {
        color: white;
        font-size: 1.5rem;
    }

    .user-details h3 {
        margin: 0;
        font-size: 1.2rem;
        color: #333;
    }

    .review-date {
        color: #666;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Product Info */
    .product-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
    }

    .product-icon {
        font-size: 1.5rem;
        color: #002fff;
    }

    .product-info h4 {
        margin: 0;
        color: #333;
    }

    /* Rating Display */
    .rating-display {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 30px;
    }

    .rating-stars {
        display: flex;
        gap: 5px;
    }

    .rating-stars i {
        color: #ffc107;
        font-size: 1.3rem;
        transition: transform 0.3s ease;
    }

    .rating-stars i:hover {
        transform: scale(1.2);
    }

    .rating-text {
        font-weight: 600;
        color: #333;
    }

    /* Review Content */
    .review-content {
        position: relative;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 15px;
        margin-bottom: 30px;
    }

    .quote-icon {
        position: absolute;
        color: #002fff;
        opacity: 0.1;
        font-size: 1.5rem;
    }

    .fa-quote-left {
        top: 10px;
        left: 10px;
    }

    .fa-quote-right {
        bottom: 10px;
        right: 10px;
    }

    .review-content p {
        margin: 0;
        color: #333;
        line-height: 1.6;
    }

    /* Button Group */
    .button-group {
        display: flex;
        gap: 15px;
    }

    .back-btn,
    .write-review-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .back-btn {
        background: #ffc107;
        color: #000;
    }

    .write-review-btn {
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        color: white;
    }

    .back-btn:hover,
    .write-review-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* Not Found Card */
    .not-found-card {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .not-found-card i {
        font-size: 3rem;
        color: #002fff;
        margin-bottom: 20px;
    }

    .not-found-card h2 {
        margin-bottom: 30px;
        color: #333;
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
            padding: 30px;
        }

        .button-group {
            flex-direction: column;
        }

        .back-btn,
        .write-review-btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 30px 0;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .review-card {
            padding: 20px;
        }

        .user-info {
            flex-direction: column;
            text-align: center;
        }

        .avatar {
            margin-right: 0;
            margin-bottom: 15px;
        }

        .rating-display {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
@endsection
