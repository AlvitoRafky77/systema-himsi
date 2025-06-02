@extends('layouts.frontend')

@section('content')
<div class="product-detail-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Detail Produk</h1>
                <div class="hero-line"></div>
            </div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        <div class="navigation-wrapper">
            <a href="{{ route('dashboard') }}" class="back-button">
                <i class="fas fa-home"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>

        <div class="row g-4 product-grid">
            @foreach($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}"
                             class="product-image"
                             alt="{{ $product->name }}">
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <p class="mb-2">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <div class="price-tag">
                            <span class="currency">Rp</span>
                            <span class="amount">{{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="stock-info">
                            <i class="fas fa-box"></i>
                            <span>Stok: {{ $product->stock }}</span>
                        </div>

                        @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="purchase-form">
                                @csrf
                                <div class="input-group">
                                    <input type="number"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           max="{{ $product->stock }}"
                                           class="form-control quantity-input"
                                           required>
                                    <button type="submit" class="btn add-to-cart-btn">
                                        <i class="fas fa-shopping-cart"></i>
                                        Tambah
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="stock-empty">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Stok habis</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .product-detail-page {
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

    /* Navigation */
    .navigation-wrapper {
        margin-bottom: 30px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        background: white;
        border-radius: 50px;
        color: #002fff;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .back-button:hover {
        transform: translateX(-5px);
        background: #002fff;
        color: white;
    }

    .back-button i {
        margin-right: 8px;
    }

    /* Product Card */
    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .product-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .product-image-wrapper {
        position: relative;
        padding-top: 75%;
        overflow: hidden;
    }

    .product-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,47,255,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px);
    }

    .product-image-wrapper:hover .product-image {
        transform: scale(1.1);
    }

    .product-image-wrapper:hover .product-overlay {
        opacity: 1;
    }

    .overlay-content {
        color: white;
        padding: 20px;
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .product-image-wrapper:hover .overlay-content {
        transform: translateY(0);
    }

    .product-content {
        padding: 20px;
        background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(247,249,255,0.5) 100%);
    }

    .product-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
        transition: color 0.3s ease;
    }

    .product-card:hover .product-title {
        color: #002fff;
    }

    .price-tag {
        margin-bottom: 15px;
    }

    .currency {
        color: #666;
        font-size: 0.9rem;
    }

    .amount {
        font-size: 1.3rem;
        font-weight: 700;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stock-info {
        display: flex;
        align-items: center;
        color: #666;
        margin-bottom: 15px;
    }

    .stock-info i {
        margin-right: 8px;
        color: #002fff;
    }

    /* Purchase Form */
    .purchase-form {
        margin-top: 15px;
    }

    .input-group {
        display: flex;
        align-items: stretch;
        width: 100%;
        gap: 8px;
    }

    .quantity-input {
        width: 50px !important;
        border: 1px solid #dee2e6 !important;
        border-radius: 4px !important;
        text-align: center;
        padding: 4px !important;
        height: 38px !important;
        font-size: 0.9rem;
        background-color: #fff !important;
    }

    .quantity-input:focus {
        border-color: #0072FF !important;
        box-shadow: 0 0 0 0.2rem rgba(0,114,255,0.25) !important;
    }

    .add-to-cart-btn {
        flex: 1;
        background: #ffc107;
        color: #000;
        border: none;
        border-radius: 4px;
        padding: 8px 15px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        min-width: 120px;
    }

    .add-to-cart-btn:hover {
        background: #ffb300;
        transform: translateY(-1px);
    }

    .add-to-cart-btn i {
        margin-right: 8px;
        font-size: 0.95rem;
    }

    .stock-empty {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        background: #fff4e5;
        border-radius: 4px;
        color: #ff9800;
        font-size: 0.9rem;
    }

    .stock-empty i {
        margin-right: 8px;
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

        .product-grid {
            margin: 0 -10px;
        }

        .product-card {
            margin: 0 10px 20px;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 30px 0;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .back-button span {
            display: none;
        }

        .product-content {
            padding: 15px;
        }

        .product-title {
            font-size: 1.1rem;
        }

        .input-group {
            flex-wrap: nowrap;
            gap: 6px;
        }

        .quantity-input {
            width: 45px !important;
            height: 35px !important;
            padding: 2px !important;
        }

        .add-to-cart-btn {
            height: 35px;
            padding: 6px 12px;
            min-width: 100px;
            font-size: 0.9rem;
        }
    }
</style>
@endsection
