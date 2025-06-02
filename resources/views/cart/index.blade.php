@extends('layouts.frontend')

@section('title', 'Keranjang Belanja')

@section('styles')
<style>
    .cart-container {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .cart-header {
        background: linear-gradient(135deg, #4B6CB7 0%, #182848 100%);
        padding: 2rem;
        color: white;
        position: relative;
    }

    .cart-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FFD93D, #FF8E3C);
    }

    .cart-title {
        font-size: 2.5rem;
        margin: 0;
        font-weight: 600;
    }

    .cart-empty {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        margin: 2rem 0;
    }

    .cart-empty-icon {
        font-size: 4rem;
        color: #4B6CB7;
        margin-bottom: 1rem;
    }

    .product-card {
        display: flex;
        align-items: center;
        padding: 2rem;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease;
        gap: 2rem;
        margin-bottom: 1rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .product-card:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        width: 120px;
        height: 120px;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .product-image:hover {
        transform: scale(1.05);
    }

    .product-details {
        flex: 1;
        padding: 0 1rem;
        min-width: 200px;
    }

    .product-name {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #182848;
    }

    .product-price {
        color: #4B6CB7;
        font-weight: 600;
        font-size: 1.15rem;
        white-space: nowrap;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: #f8f9fa;
        padding: 0.75rem 1rem;
        border-radius: 25px;
        width: fit-content;
        margin: 0 1.5rem;
        border: 1px solid #e9ecef;
    }

    .quantity-input {
        width: 70px;
        text-align: center;
        border: none;
        background: transparent;
        font-weight: 600;
        color: #182848;
        font-size: 1.1rem;
        padding: 0.25rem;
    }

    .quantity-input:focus {
        outline: none;
    }

    .update-btn {
        background: linear-gradient(135deg, #4B6CB7 0%, #182848 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.25rem;
        border-radius: 20px;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .update-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(75, 108, 183, 0.3);
    }

    .remove-btn {
        background: linear-gradient(135deg, #ff4b4b 0%, #ff0000 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.25rem;
        border-radius: 20px;
        transition: all 0.3s ease;
        margin-left: 1rem;
    }

    .remove-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 75, 75, 0.3);
    }

    .cart-items-container {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .cart-total {
        background: linear-gradient(135deg, #182848 0%, #4B6CB7 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .checkout-btn {
        background: linear-gradient(135deg, #FFD93D 0%, #FF8E3C 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .checkout-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(255, 142, 60, 0.4);
        color: white;
    }

    .category-btn {
        background: white;
        color: #4B6CB7;
        border: 2px solid #4B6CB7;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 600;
    }

    .category-btn:hover {
        background: #4B6CB7;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(75, 108, 183, 0.3);
    }

    @media (max-width: 1200px) {
        .product-card {
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .quantity-control {
            margin: 0 1rem;
        }
    }

    @media (max-width: 992px) {
        .product-card {
            flex-wrap: wrap;
        }

        .product-details {
            min-width: 150px;
        }

        .quantity-control {
            margin: 1rem 0;
        }
    }

    @media (max-width: 768px) {
        .cart-container {
            border-radius: 15px;
            margin: 1rem;
        }

        .cart-header {
            padding: 1.5rem;
        }

        .cart-title {
            font-size: 2rem;
        }

        .product-card {
            flex-direction: column;
            text-align: center;
            padding: 1.5rem;
            gap: 1.5rem;
        }

        .product-image {
            width: 150px;
            height: 150px;
        }

        .product-details {
            padding: 0;
            min-width: auto;
            width: 100%;
        }

        .quantity-control {
            margin: 0 auto;
            width: 100%;
            justify-content: center;
        }

        .cart-total {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
            margin: 1.5rem;
        }

        .remove-btn {
            margin-left: 0;
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="cart-container" data-aos="fade-up">
        <div class="cart-header">
            <h1 class="cart-title">Keranjang Belanja</h1>
        </div>

        @if($cartItems->isEmpty())
            <div class="cart-empty" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-shopping-cart cart-empty-icon"></i>
                <h4 class="mt-4">Keranjang Kosong!</h4>
                <p class="text-muted">Anda belum menambahkan produk apapun ke keranjang.</p>
                <hr>
                <p class="mb-4">Silakan lihat produk kami:</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('produk.merchandise') }}" class="category-btn">
                        <i class="fas fa-tshirt me-2"></i>Merchandise
                    </a>
                    <a href="{{ route('produk.makanan') }}" class="category-btn">
                        <i class="fas fa-utensils me-2"></i>Makanan
                    </a>
                    <a href="{{ route('produk.minuman') }}" class="category-btn">
                        <i class="fas fa-coffee me-2"></i>Minuman
                    </a>
                </div>
            </div>
        @else
            <div class="cart-items-container">
                @foreach($cartItems as $item)
                    <div class="product-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <img src="{{ $item->produk->image ? asset('storage/' . $item->produk->image) : asset('images/default-product.png') }}"
                             alt="{{ $item->produk->name }}"
                             class="product-image">

                        <div class="product-details">
                            <h5 class="product-name">{{ $item->produk->name }}</h5>
                            <div class="product-price">Rp {{ number_format($item->produk->price, 0, ',', '.') }}</div>
                        </div>

                        <form action="{{ route('cart.update', $item) }}" method="POST" class="quantity-control">
                            @csrf
                            @method('PUT')
                            <input type="number"
                                   name="quantity"
                                   value="{{ $item->quantity }}"
                                   min="1"
                                   class="quantity-input">
                            <button type="submit" class="update-btn" title="Update jumlah">
                                <i class="fas fa-sync-alt"></i> Update
                            </button>
                        </form>

                        <div class="product-price">
                            Rp {{ number_format($item->produk->price * $item->quantity, 0, ',', '.') }}
                        </div>

                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn" title="Hapus item">
                                <i class="fas fa-trash me-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                @endforeach

                <div class="cart-total" data-aos="fade-up" data-aos-delay="200">
                    <div class="h4 mb-0">Total: Rp {{ number_format($total, 0, ',', '.') }}</div>
                    <a href="{{ route('checkout') }}" class="checkout-btn">
                        Lanjut ke Pembayaran
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
