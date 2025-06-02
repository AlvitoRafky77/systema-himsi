@extends('layouts.frontend')

@section('title', 'Tentang Kami - Systema HIMSI')

@section('content')
<div class="about-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Tentang Kami</h1>
                    <div class="hero-line"></div>
                    <p class="hero-subtitle">Membangun Masa Depan Digital Bersama HIMSI</p>
                </div>
            </div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <!-- Main Content -->
    <div class="container content-section">
        <div class="row g-4">
            <!-- Vision Section -->
            <div class="col-lg-6">
                <div class="content-card vision-card">
                    <div class="card-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h2>Visi Kami</h2>
                    <p>Menjadi platform digital terdepan yang menghubungkan kreativitas mahasiswa Sistem Informasi dengan kebutuhan komunitas kampus, menciptakan ekosistem wirausaha yang inovatif dan berkelanjutan.</p>
                </div>
            </div>

            <!-- Mission Section -->
            <div class="col-lg-6">
                <div class="content-card mission-card">
                    <div class="card-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h2>Misi Kami</h2>
                    <ul>
                        <li>Mengembangkan produk berkualitas yang mencerminkan identitas HIMSI</li>
                        <li>Mendorong semangat kewirausahaan di kalangan mahasiswa</li>
                        <li>Membangun jaringan kolaborasi yang kuat antar mahasiswa</li>
                    </ul>
                </div>
            </div>

            <!-- About Section -->
            <div class="col-12">
                <div class="content-card about-card">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h2>Systema HIMSI</h2>
                    <p>Systema HIMSI adalah manifestasi dari semangat inovasi dan kreativitas mahasiswa Sistem Informasi Telkom University Jakarta. Platform ini tidak hanya sekadar marketplace, tetapi juga merupakan wadah yang mempertemukan passion teknologi dengan jiwa wirausaha mahasiswa.</p>
                    <p>Kami percaya bahwa setiap produk memiliki cerita unik yang mencerminkan dedikasi dan kreativitas pembuatnya. Dari merchandise eksklusif hingga kuliner yang menggugah selera, setiap item di Systema HIMSI dipilih dengan cermat untuk memberikan pengalaman terbaik bagi komunitas kampus.</p>
                </div>
            </div>

            <!-- Features Section -->
            <div class="col-12">
                <div class="features-section">
                    <h2 class="text-center mb-4">Mengapa Memilih Kami?</h2>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3>Kualitas Premium</h3>
                                <p>Setiap produk melalui proses kurasi ketat untuk memastikan kualitas terbaik</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </div>
                                <h3>Mendukung UMKM Kampus</h3>
                                <p>Berkontribusi langsung dalam pengembangan ekonomi kreatif mahasiswa</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h3>Terpercaya</h3>
                                <p>Dikelola langsung oleh HIMSI dengan standar profesional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

    .about-page {
        font-family: 'Montserrat', sans-serif;
    }

    /* Hero Section Styles */
    .hero-section {
        position: relative;
        min-height: 400px;
        background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
        padding: 80px 0;
        overflow: hidden;
        margin-bottom: 60px;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><rect width="1" height="1" fill="rgba(255,255,255,0.05)"/></svg>');
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
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .hero-title {
        color: white;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .hero-line {
        width: 100px;
        height: 4px;
        background: #ffc107;
        margin: 20px 0;
        transform: scaleX(0);
        animation: expandLine 0.8s ease forwards 0.8s;
    }

    .hero-subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 1.2rem;
        margin-top: 20px;
    }

    /* Content Section Styles */
    .content-section {
        margin-bottom: 60px;
    }

    .content-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }

    .card-icon {
        font-size: 2rem;
        color: #002fff;
        margin-bottom: 20px;
        opacity: 0.9;
    }

    .content-card h2 {
        color: #333;
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .content-card p, .content-card ul {
        color: #666;
        line-height: 1.8;
        margin-bottom: 0;
    }

    .content-card ul {
        padding-left: 20px;
    }

    .content-card li {
        margin-bottom: 10px;
    }

    /* Features Section Styles */
    .features-section {
        margin-top: 40px;
    }

    .feature-card {
        text-align: center;
        padding: 30px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 2.5rem;
        color: #002fff;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        font-size: 1.3rem;
        color: #333;
        margin-bottom: 15px;
    }

    .feature-card p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
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

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .hero-section {
            min-height: 350px;
            padding: 60px 0;
        }

        .hero-title {
            font-size: 2.8rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 300px;
            padding: 40px 0;
        }

        .hero-title {
            font-size: 2.2rem;
        }

        .content-card, .feature-card {
            padding: 20px;
        }

        .feature-icon {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            min-height: 250px;
            padding: 30px 0;
        }

        .hero-title {
            font-size: 1.8rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .content-card h2 {
            font-size: 1.5rem;
        }
    }
</style>
@endsection
