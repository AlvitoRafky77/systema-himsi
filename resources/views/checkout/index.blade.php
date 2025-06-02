@extends('layouts.frontend')

@section('title', 'Checkout')

@section('styles')
<style>
    :root {
        --primary-color: #4B6CB7;
        --secondary-color: #182848;
        --accent-color: #FFD93D;
        --text-color: #2D3748;
        --border-radius: 15px;
    }

    body {
        background: linear-gradient(135deg, #f6f8fd 0%, #f1f4f9 100%);
    }

    .checkout-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .checkout-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .checkout-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
        transform: skewY(-4deg);
    }

    .checkout-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .checkout-form {
        padding: 2.5rem;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }

    .form-section-title {
        color: var(--secondary-color);
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .form-section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        border-radius: 2px;
    }

    .form-control {
        border: 2px solid #E2E8F0;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #F7FAFC;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(75, 108, 183, 0.1);
        background: white;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 0.75rem;
        font-size: 1.1rem;
    }

    .payment-methods {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .payment-method-option {
        display: flex;
        align-items: center;
        padding: 1rem;
        background: white;
        border: 2px solid #E2E8F0;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .payment-method-option:hover {
        border-color: var(--primary-color);
        background: rgba(75, 108, 183, 0.05);
    }

    .payment-method-option input[type="radio"] {
        margin-right: 1rem;
        width: 20px;
        height: 20px;
        accent-color: var(--primary-color);
    }

    .payment-method-option label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        color: var(--text-color);
        margin: 0;
        cursor: pointer;
    }

    .payment-method-option i {
        font-size: 1.25rem;
        color: var(--primary-color);
    }

    .process-btn {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border: none;
        padding: 1.25rem 2rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .process-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .process-btn:hover::before {
        left: 100%;
    }

    .process-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(75, 108, 183, 0.3);
    }

    .order-summary {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    .summary-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        color: white;
        padding: 1.75rem;
        border-radius: var(--border-radius) var(--border-radius) 0 0;
        position: relative;
        overflow: hidden;
    }

    .summary-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-color), #FF8E3C);
    }

    .summary-content {
        padding: 2rem;
    }

    .product-item {
        display: flex;
        justify-content: space-between;
        align-items: start;
        padding: 1.25rem 0;
        border-bottom: 1px solid #E2E8F0;
        transition: all 0.3s ease;
    }

    .product-item:hover {
        transform: translateX(5px);
        background: rgba(75, 108, 183, 0.02);
    }

    .product-info h6 {
        color: var(--text-color);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .product-price {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.1rem;
    }

    .total-section {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid #E2E8F0;
    }

    .total-amount {
        font-size: 1.75rem;
        color: var(--secondary-color);
        font-weight: 800;
    }

    .alert {
        border: none;
        border-radius: var(--border-radius);
        padding: 1rem 1.5rem;
        margin: 1.5rem;
        background: rgba(220, 38, 38, 0.1);
        color: #DC2626;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    @media (max-width: 992px) {
        .checkout-header {
            padding: 2rem;
        }

        .checkout-title {
            font-size: 2rem;
        }

        .form-section-title {
            font-size: 1.5rem;
        }

        .order-summary {
            margin-top: 2rem;
            position: static;
        }
    }

    @media (max-width: 768px) {
        .checkout-container {
            margin: 1rem;
        }

        .checkout-form,
        .summary-content {
            padding: 1.5rem;
        }

        .payment-methods {
            grid-template-columns: 1fr;
        }
    }

    /* Animasi Loading */
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }

    .loading {
        animation: shimmer 2s infinite linear;
        background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
        background-size: 1000px 100%;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="checkout-container" data-aos="fade-up">
        <div class="checkout-header">
            <h1 class="checkout-title">Checkout</h1>
        </div>

        @if(session('error'))
            <div class="alert" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="row p-4">
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="100">
                <div class="checkout-form">
                    <h5 class="form-section-title">Detail Pengiriman</h5>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   id="nama"
                                   name="nama"
                                   value="{{ old('nama', Auth::user()->name) }}"
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                      id="alamat"
                                      name="alamat"
                                      rows="3"
                                      required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text"
                                   class="form-control @error('no_hp') is-invalid @enderror"
                                   id="no_hp"
                                   name="no_hp"
                                   value="{{ old('no_hp') }}"
                                   required>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-section mb-4">
                            <h3 class="form-section-title">Metode Pembayaran</h3>
                            <div class="payment-methods">
                                <div class="payment-method-option">
                                    <input type="radio" id="transfer_bank" name="metode_pembayaran" value="transfer_bank" required>
                                    <label for="transfer_bank">
                                        <i class="fas fa-university"></i>
                                        Transfer Bank
                                    </label>
                                </div>
                                <div class="payment-method-option">
                                    <input type="radio" id="cod" name="metode_pembayaran" value="cod" required>
                                    <label for="cod">
                                        <i class="fas fa-money-bill-wave"></i>
                                        Cash on Delivery (COD)
                                    </label>
                                </div>
                            </div>
                            @error('metode_pembayaran')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="process-btn">
                            <i class="fas fa-check me-2"></i>
                            Proses Pesanan
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                <div class="order-summary">
                    <div class="summary-header">
                        <h5 class="mb-0">Ringkasan Pesanan</h5>
                    </div>

                    <div class="summary-content">
                        @foreach($cartItems as $item)
                            <div class="product-item">
                                <div class="product-info">
                                    <h6>{{ $item->produk->name }}</h6>
                                    <small class="text-muted">{{ $item->quantity }} x Rp {{ number_format($item->produk->price, 0, ',', '.') }}</small>
                                </div>
                                <div class="product-price">
                                    Rp {{ number_format($item->produk->price * $item->quantity, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach

                        <div class="total-section">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Total</h5>
                                <div class="total-amount">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentCards = document.querySelectorAll('.payment-method-card');

        function selectPaymentMethod(card) {
            // Remove selected class from all cards
            paymentCards.forEach(c => {
                c.classList.remove('selected');
                const radio = c.querySelector('input[type="radio"]');
                if (radio) radio.checked = false;
            });

            // Add selected class to clicked card and check the radio
            card.classList.add('selected');
            const radio = card.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                // Trigger change event
                radio.dispatchEvent(new Event('change'));
            }

            // Save selection to localStorage
            localStorage.setItem('selectedPaymentMethod', card.dataset.method);
        }

        // Add click event to all payment cards
        paymentCards.forEach(card => {
            const radio = card.querySelector('input[type="radio"]');

            // Handle card click
            card.addEventListener('click', (e) => {
                if (e.target !== radio) {
                    selectPaymentMethod(card);
                }
            });

            // Handle radio change
            radio.addEventListener('change', () => {
                if (radio.checked) {
                    selectPaymentMethod(card);
                }
            });
        });

        // Initialize selected payment method
        const savedMethod = localStorage.getItem('selectedPaymentMethod');
        if (savedMethod) {
            const savedCard = document.querySelector(`.payment-method-card[data-method="${savedMethod}"]`);
            if (savedCard) {
                selectPaymentMethod(savedCard);
            }
        } else {
            // Check if there's a pre-selected method from old input
            const checkedPayment = document.querySelector('input[name="metode_pembayaran"]:checked');
            if (checkedPayment) {
                const card = checkedPayment.closest('.payment-method-card');
                if (card) selectPaymentMethod(card);
            }
        }
    });
</script>
@endsection
