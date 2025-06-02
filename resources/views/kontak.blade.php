@extends('layouts.frontend')

@section('title', 'Kontak Kami')

@section('content')
<div class="contact-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Kontak Kami</h1>
            <div class="hero-line"></div>
            <p class="hero-subtitle">Kami Siap Membantu Anda</p>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        <div class="row g-4">
            <!-- Map Card -->
            <div class="col-lg-6">
                <div class="location-card">
                    <div class="card-header">
                        <i class="fas fa-map-marker-alt"></i>
                        <h2>Lokasi Kami</h2>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.380582935824!2d106.84080997586805!3d-6.2134347608619205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d99fe71b5b%3A0x4613509b4a40b539!2sUniversitas%20Telkom%20Jakarta%20Kampus%20Minangkabau!5e0!3m2!1sid!2sid!4v1746190785092!5m2!1sid!2sid"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="map">
                        </iframe>
                    </div>
                    <div class="address-info">
                        <i class="fas fa-building"></i>
                        <p>
                            Jl. Minangkabau Barat No.50, RT.1/RW.1, Ps. Manggis,<br>
                            Kecamatan Setiabudi, Kota Jakarta Selatan,<br>
                            Daerah Khusus Ibukota Jakarta 12970
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="col-lg-6">
                <div class="contact-card">
                    <div class="card-header">
                        <i class="fas fa-envelope"></i>
                        <h2>Hubungi Kami</h2>
                    </div>
                    <form action="{{ route('kontak.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="nama" name="nama" required value="{{ old('nama', Auth::user()->name ?? '') }}">
                                <label for="nama">Nama Anda</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="email" name="email" required value="{{ old('email', Auth::user()->email ?? '') }}">
                                <label for="email">Email Anda</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                <label for="no_hp">Nomor Telepon</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-comment input-icon"></i>
                                <textarea id="pesan" name="pesan" rows="4" required>{{ old('pesan') }}</textarea>
                                <label for="pesan">Pesan Anda</label>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">
                            <span>Kirim Pesan</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .contact-page {
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

    @keyframes moveBackground {
        from { background-position: 0 0; }
        to { background-position: 40px 40px; }
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

    /* Main Content */
    .main-content {
        padding: 40px 0;
    }

    /* Location Card */
    .location-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards;
    }

    .card-header {
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        color: white;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header i {
        font-size: 1.5rem;
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .map-container {
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    .map {
        width: 100%;
        height: 100%;
        border: none;
        transition: transform 0.3s ease;
    }

    .map:hover {
        transform: scale(1.02);
    }

    .address-info {
        padding: 20px;
        display: flex;
        align-items: flex-start;
        gap: 15px;
        background: #f8f9fa;
    }

    .address-info i {
        color: #002fff;
        font-size: 1.2rem;
        margin-top: 5px;
    }

    .address-info p {
        margin: 0;
        color: #333;
        line-height: 1.6;
    }

    /* Contact Form Card */
    .contact-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards 0.2s;
    }

    .contact-form {
        padding: 30px;
    }

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

    .input-wrapper input,
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

    .input-wrapper input:focus,
    .input-wrapper textarea:focus,
    .input-wrapper input:not(:placeholder-shown),
    .input-wrapper textarea:not(:placeholder-shown) {
        border-color: #002fff;
        box-shadow: 0 0 0 4px rgba(0,47,255,0.1);
    }

    .input-wrapper input:focus + label,
    .input-wrapper textarea:focus + label,
    .input-wrapper input:not(:placeholder-shown) + label,
    .input-wrapper textarea:not(:placeholder-shown) + label {
        top: 0;
        left: 15px;
        font-size: 0.85rem;
        padding: 0 5px;
        background: white;
        color: #002fff;
    }

    .submit-btn {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        color: white;
        font-size: 1rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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

        .card-header h2 {
            font-size: 1.3rem;
        }

        .map-container {
            height: 250px;
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

        .contact-form {
            padding: 20px;
        }

        .card-header {
            padding: 15px;
        }

        .map-container {
            height: 200px;
        }
    }
</style>
@endsection
