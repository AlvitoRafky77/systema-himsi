@extends('layouts.frontend')
@section('title', 'Tulis Review Baru')

@section('content')
<div class="create-review-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Tulis Review Baru</h1>
            <div class="hero-line"></div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        @if ($errors->any())
            <div class="alert-wrapper error">
                <div class="custom-alert danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="alert-wrapper">
                <div class="custom-alert success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('reviews.store') }}" method="POST" class="review-form">
                @csrf

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-box input-icon"></i>
                        <select id="product_id" name="product_id" required>
                            <option value="" selected disabled>-- Pilih Produk --</option>
                            @foreach ($products as $product_item)
                                <option value="{{ $product_item->id }}" {{ old('product_id') == $product_item->id ? 'selected' : '' }}>
                                    {{ $product_item->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="product_id">Pilih Produk yang Direview</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="rating-wrapper">
                        <label class="rating-label">Rating Anda</label>
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5" {{ old('rating') == '5' ? 'checked' : '' }}>
                            <label for="star5" title="5 - Sangat Baik"><i class="fas fa-star"></i></label>

                            <input type="radio" id="star4" name="rating" value="4" {{ old('rating') == '4' ? 'checked' : '' }}>
                            <label for="star4" title="4 - Baik"><i class="fas fa-star"></i></label>

                            <input type="radio" id="star3" name="rating" value="3" {{ old('rating') == '3' ? 'checked' : '' }}>
                            <label for="star3" title="3 - Cukup"><i class="fas fa-star"></i></label>

                            <input type="radio" id="star2" name="rating" value="2" {{ old('rating') == '2' ? 'checked' : '' }}>
                            <label for="star2" title="2 - Buruk"><i class="fas fa-star"></i></label>

                            <input type="radio" id="star1" name="rating" value="1" {{ old('rating') == '1' ? 'checked' : '' }}>
                            <label for="star1" title="1 - Sangat Buruk"><i class="fas fa-star"></i></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-comment input-icon"></i>
                        <textarea id="review" name="review" rows="4" required>{{ old('review') }}</textarea>
                        <label for="review">Isi Review</label>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="submit-btn">
                        <span>Kirim Review</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                    <a href="{{ route('review.index') }}" class="cancel-btn">
                        <span>Batal</span>
                        <i class="fas fa-times"></i>
                    </a>
                    <a href="{{ route('review.index') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Review</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .create-review-page {
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

    /* Alert Styles */
    .alert-wrapper {
        margin-bottom: 30px;
    }

    .custom-alert {
        display: flex;
        align-items: flex-start;
        padding: 15px 20px;
        border-radius: 10px;
        background: white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        animation: slideIn 0.5s ease forwards;
    }

    .custom-alert.success {
        border-left: 4px solid #28a745;
    }

    .custom-alert.danger {
        border-left: 4px solid #dc3545;
    }

    .custom-alert i {
        font-size: 1.2rem;
        margin-right: 10px;
        margin-top: 3px;
    }

    .custom-alert.success i {
        color: #28a745;
    }

    .custom-alert.danger i {
        color: #dc3545;
    }

    .custom-alert ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* Form Card */
    .form-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards 0.2s;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 25px;
    }

    .input-wrapper {
        position: relative;
        margin-top: 25px;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #002fff;
        font-size: 1.1rem;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .input-wrapper select,
    .input-wrapper textarea {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .input-wrapper textarea {
        min-height: 120px;
        resize: vertical;
    }

    .input-wrapper label {
        position: absolute;
        left: 45px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1rem;
        color: #666;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .input-wrapper textarea + label {
        top: 30px;
    }

    .input-wrapper select:focus,
    .input-wrapper textarea:focus,
    .input-wrapper select:not([value=""]),
    .input-wrapper textarea:not(:placeholder-shown) {
        border-color: #002fff;
        box-shadow: 0 0 0 4px rgba(0,47,255,0.1);
    }

    .input-wrapper select:focus + label,
    .input-wrapper textarea:focus + label,
    .input-wrapper select:not([value=""]) + label,
    .input-wrapper textarea:not(:placeholder-shown) + label {
        top: 0;
        left: 15px;
        font-size: 0.85rem;
        padding: 0 5px;
        background: white;
        color: #002fff;
    }

    /* Rating Stars */
    .rating-wrapper {
        text-align: center;
        padding: 20px 0;
    }

    .rating-label {
        display: block;
        margin-bottom: 15px;
        color: #333;
        font-weight: 500;
    }

    .star-rating {
        display: inline-flex;
        flex-direction: row-reverse;
        gap: 5px;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        cursor: pointer;
        font-size: 1.5rem;
        color: #ddd;
        transition: all 0.2s ease;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input:checked ~ label {
        color: #ffc107;
        transform: scale(1.1);
    }

    /* Button Group */
    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .submit-btn,
    .cancel-btn,
    .back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn {
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        color: white;
        flex: 2;
    }

    .cancel-btn {
        background: #dc3545;
        color: white;
        flex: 1;
        text-decoration: none;
    }

    .back-btn {
        background: #ffc107;
        color: #000;
        flex: 1;
        text-decoration: none;
    }

    .submit-btn:hover,
    .cancel-btn:hover,
    .back-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .submit-btn:hover {
        background: linear-gradient(135deg, #0027db 0%, #005cd9 100%);
    }

    .cancel-btn:hover {
        background: #c82333;
    }

    .back-btn:hover {
        background: #e0a800;
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

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
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

        .form-card {
            padding: 30px;
        }

        .button-group {
            flex-direction: column;
        }

        .submit-btn,
        .cancel-btn,
        .back-btn {
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

        .form-card {
            padding: 20px;
        }

        .star-rating label {
            font-size: 1.3rem;
        }
    }
</style>
@endsection
