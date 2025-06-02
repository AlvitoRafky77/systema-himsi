@extends('layouts.frontend')

@section('title', $produk->name)

@section('styles')
<style>
    .product-container {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-top: 2rem;
    }

    .product-image {
        transition: transform 0.3s ease-in-out;
        border-radius: 15px;
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .product-image:hover {
        transform: scale(1.02);
    }

    .product-details {
        padding: 2rem;
    }

    .product-title {
        font-size: 2.5rem;
        font-weight: 600;
        background: linear-gradient(45deg, #2193b0, #6dd5ed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
    }

    .category-badge {
        background: linear-gradient(45deg, #FF512F, #F09819);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        display: inline-block;
        font-weight: 500;
        margin-bottom: 1.5rem;
    }

    .price-tag {
        font-size: 2rem;
        color: #2193b0;
        font-weight: bold;
    }

    .stock-indicator {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin: 1rem 0;
    }

    .quantity-input {
        max-width: 150px;
        border-radius: 25px;
        overflow: hidden;
        border: 1px solid #dee2e6;
    }

    .quantity-input .form-control {
        border: none;
        text-align: center;
        background: white;
        font-size: 1.1rem;
        padding: 0.75rem 0;
        width: 60px;
    }

    .quantity-input .form-control:focus {
        box-shadow: none;
    }

    .quantity-btn {
        background: #f8f9fa;
        border: none;
        padding: 0.75rem 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #444;
    }

    .quantity-btn:hover {
        background: #e9ecef;
    }

    .quantity-btn:active {
        background: #dee2e6;
    }

    /* Disable spinners for number input */
    .quantity-input input[type="number"]::-webkit-inner-spin-button,
    .quantity-input input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .quantity-input input[type="number"] {
        -moz-appearance: textfield;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-add-cart {
        background: linear-gradient(45deg, #FFD93D, #FF8E3C);
        border: none;
        padding: 12px 25px;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-add-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 142, 60, 0.4);
    }

    .btn-back {
        background: linear-gradient(45deg, #4B6CB7, #182848);
        border: none;
        padding: 12px 25px;
        border-radius: 25px;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(75, 108, 183, 0.4);
        color: white;
    }

    .reviews-section {
        margin-top: 4rem;
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 15px;
    }

    .review-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        padding: 1.5rem;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .review-user {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .review-user-avatar {
        width: 40px;
        height: 40px;
        background: var(--primary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .review-user-info {
        display: flex;
        flex-direction: column;
    }

    .review-date {
        background: #f8f9fa;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .star-rating {
        color: #ffd700;
        margin-top: 0.25rem;
    }

    .review-content {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #444;
    }

    @media (max-width: 768px) {
        .product-title {
            font-size: 2rem;
        }

        .price-tag {
            font-size: 1.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .quantity-input {
            max-width: 100%;
            margin-bottom: 1rem;
        }

        .reviews-section {
            padding: 1rem;
        }

        .review-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .review-date {
            align-self: flex-start;
        }
    }

    .quantity-select {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
        border-radius: 25px;
        font-size: 1.1rem;
        width: 100px;
        background-color: white;
        cursor: pointer;
        text-align: center;
    }

    .quantity-select:focus {
        outline: none;
        border-color: #4B6CB7;
        box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
    }

    .stock-info {
        background: #f8f9fa;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        color: #6c757d;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="product-container">
        <div class="row g-0">
            <div class="col-md-6" data-aos="fade-right">
                <div class="p-4">
                    @if($produk->image)
                        <img src="{{ asset('storage/' . $produk->image) }}" class="product-image" alt="{{ $produk->name }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="product-image" alt="No Image">
                    @endif
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="product-details">
                    <h1 class="product-title">{{ $produk->name }}</h1>
                    <div class="category-badge">
                        <i class="fas fa-tag me-2"></i>{{ $produk->type }}
                    </div>
                    <h3 class="price-tag mb-4">Rp {{ number_format($produk->price, 0, ',', '.') }}</h3>

                    <div class="stock-indicator">
                        <h5 class="mb-2"><i class="fas fa-box me-2"></i>Stok Tersedia:</h5>
                        <p class="mb-0 fs-5">{{ $produk->stock }} unit</p>
                    </div>

                    <div class="description-box">
                        <h5 class="mb-3"><i class="fas fa-info-circle me-2"></i>Deskripsi Produk:</h5>
                        <p class="lead">{{ $produk->description }}</p>
                    </div>

                    @if($produk->stock > 0)
                        <form action="{{ route('cart.add', $produk->id) }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="d-flex align-items-center">
                                    <select name="quantity" class="quantity-select">
                                        @for($i = 1; $i <= min($produk->stock, 10); $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <span class="stock-info">
                                    <i class="fas fa-box me-1"></i>
                                    Tersedia: {{ $produk->stock }} unit
                                </span>
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn btn-add-cart">
                                    <i class="fas fa-shopping-cart me-2"></i> Tambah ke Keranjang
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-back">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning rounded-pill">
                            <i class="fas fa-exclamation-triangle me-2"></i> Stok produk habis
                        </div>
                        <div class="action-buttons">
                            <a href="{{ url()->previous() }}" class="btn btn-back">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="reviews-section" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">
                <i class="fas fa-comments me-2"></i>Review Produk
                <span class="badge bg-primary ms-2">{{ $produk->reviews->count() }}</span>
            </h3>
            @auth
                <a href="{{ route('review.create', ['product_id' => $produk->id]) }}" class="btn btn-add-cart">
                    <i class="fas fa-plus me-2"></i>Tulis Review
                </a>
            @endauth
        </div>

        @if($produk->reviews->count() > 0)
            <div class="row g-4">
                @foreach($produk->reviews as $review)
                    <div class="col-md-6">
                        <div class="review-card">
                            <div class="review-header">
                                <div class="review-user">
                                    <div class="review-user-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="review-user-info">
                                        <h5 class="mb-0">{{ $review->user->name }}</h5>
                                        <div class="star-rating">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="review-date">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $review->created_at->format('d M Y') }}
                                </div>
                            </div>
                            <div class="review-content">
                                {{ $review->review }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info rounded-pill">
                <i class="fas fa-info-circle me-2"></i>
                Belum ada review untuk produk ini.
                @auth
                    Jadilah yang pertama memberikan review!
                @else
                    <a href="{{ route('login') }}" class="alert-link">Login</a> untuk memberikan review.
                @endauth
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@endsection
