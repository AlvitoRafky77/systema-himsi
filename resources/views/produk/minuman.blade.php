@extends('layouts.frontend')

@section('title', 'Produk Minuman')

@section('content')
<div class="beverage-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Produk Minuman</h1>
                <div class="hero-line"></div>
                <p class="hero-subtitle">Kesegaran dalam Setiap Tegukan</p>
            </div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <!-- Products Section -->
    <div class="container products-section">
        <div class="row g-4">
            @forelse ($produk as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-product.png') }}"
                                 class="product-image"
                                 alt="{{ $item->name }}">
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <p class="mb-2">{{ $item->description }}</p>
                                    <p class="stock-info">Stok: {{ $item->stock }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">{{ $item->name }}</h3>
                            <div class="price-tag">
                                <span class="currency">Rp</span>
                                <span class="amount">{{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                            <form action="{{ route('cart.add', $item) }}" method="POST" class="purchase-form">
                                @csrf
                                <div class="input-group">
                                    <input type="number"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           max="{{ $item->stock }}"
                                           class="form-control quantity-input">
                                    <button type="submit" class="btn add-to-cart-btn">
                                        <i class="fas fa-cart-plus"></i>
                                        <span>Tambah</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-glass-water"></i>
                        <p>Tidak ada produk minuman saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $produk->links() }}
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .beverage-page {
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

    .hero-subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 1.2rem;
        opacity: 0;
        animation: fadeIn 0.8s ease forwards 0.6s;
    }

    /* Products Section */
    .products-section {
        padding: 40px 0;
    }

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
        color: #002fff;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .purchase-form {
        margin-top: 15px;
    }

    .input-group {
        display: flex;
        align-items: center;
        width: auto;
        max-width: fit-content;
    }

    .quantity-input {
        width: 40px !important;
        border-radius: 4px 0 0 4px !important;
        border: 1px solid #dee2e6;
        text-align: center;
        padding: 6px 2px;
        height: 31px;
    }

    .add-to-cart-btn {
        background: #ffc107;
        color: #000;
        border: none;
        border-radius: 0 4px 4px 0;
        padding: 4px 12px;
        height: 31px;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .add-to-cart-btn:hover {
        background: #ffb300;
        transform: translateX(2px);
    }

    .add-to-cart-btn i {
        margin-right: 4px;
        font-size: 0.9rem;
    }

    .add-to-cart-btn span {
        font-size: 0.9rem;
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

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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

        .product-card {
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

        .hero-subtitle {
            font-size: 1rem;
        }

        .product-content {
            padding: 15px;
        }

        .product-title {
            font-size: 1.1rem;
        }
    }
</style>
@endsection
