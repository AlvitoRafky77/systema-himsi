@extends('layouts.frontend')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="search-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Hasil Pencarian</h1>
            <div class="hero-line"></div>
            <p class="hero-subtitle">Menampilkan hasil untuk "{{ request('query') }}"</p>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        @if($products->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h2>Tidak Ditemukan Produk yang Sesuai</h2>
                <p>Silakan coba lagi dengan kata kunci lain atau jelajahi kategori produk kami:</p>
                <div class="category-buttons">
                    <a href="{{ route('produk.makanan') }}" class="category-btn food">
                        <i class="fas fa-utensils"></i>
                        <span>Makanan</span>
                    </a>
                    <a href="{{ route('produk.minuman') }}" class="category-btn drink">
                        <i class="fas fa-coffee"></i>
                        <span>Minuman</span>
                    </a>
                    <a href="{{ route('produk.merchandise') }}" class="category-btn merch">
                        <i class="fas fa-tshirt"></i>
                        <span>Merchandise</span>
                    </a>
                </div>
            </div>
        @else
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No Image">
                            @endif
                            <div class="product-overlay">
                                <a href="{{ route('produk.show', $product->id) }}" class="view-details">
                                    <i class="fas fa-eye"></i>
                                    <span>Lihat Detail</span>
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <div class="category-badge">
                                <i class="fas fa-tag me-2"></i>{{ $product->type }}
                            </div>
                            <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                            <div class="product-price">
                                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination-wrapper">
                {{ $products->appends(['query' => request('query')])->links() }}
            </div>
        @endif
    </div>
</div>

<style>
    /* Base Styles */
    .search-page {
        background: #f8f9fa;
        min-height: 100vh;
        font-family: 'Montserrat', sans-serif;
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

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(-20px);
        animation: fadeInDown 0.8s ease forwards;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0;
        animation: fadeIn 0.8s ease forwards 0.4s;
    }

    .hero-line {
        width: 80px;
        height: 4px;
        background: #ffc107;
        margin: 20px auto;
        transform: scaleX(0);
        animation: expandLine 0.8s ease forwards 0.4s;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        animation: fadeInUp 0.8s ease forwards;
    }

    .empty-icon {
        font-size: 4rem;
        color: #002fff;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state h2 {
        margin-bottom: 15px;
        color: #333;
    }

    .empty-state p {
        color: #666;
        margin-bottom: 30px;
    }

    .category-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .category-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 25px;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .category-btn.food {
        background: linear-gradient(135deg, #FF416C 0%, #FF4B2B 100%);
    }

    .category-btn.drink {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .category-btn.merch {
        background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
    }

    .category-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* Products Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }

    .product-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,47,255,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .product-card:hover .product-overlay {
        opacity: 1;
    }

    .view-details {
        color: white;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .product-card:hover .view-details {
        transform: translateY(0);
    }

    .view-details i {
        font-size: 1.5rem;
    }

    .product-info {
        padding: 20px;
    }

    .product-title {
        font-size: 1.2rem;
        margin-bottom: 10px;
        color: #333;
    }

    .product-category {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .product-description {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: 600;
        color: #002fff;
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        background: rgba(0, 114, 255, 0.08);
        color: #0072FF;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        margin: 8px 0;
    }

    .category-badge i {
        font-size: 0.8rem;
        opacity: 0.8;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }

    /* Animations */
    @keyframes moveBackground {
        from { background-position: 0 0; }
        to { background-position: 40px 40px; }
    }

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

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 40px 0;
        }

        .hero-title {
            font-size: 1.8rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .category-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .category-btn {
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 30px 0;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .products-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .product-card {
            max-width: 100%;
        }
    }
</style>
@endsection