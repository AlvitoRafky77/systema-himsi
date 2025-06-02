<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Systema HIMSI')</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @yield('styles')

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.18);
            --navbar-height: 70px;
            --section-spacing: 2rem;
            --item-spacing: 1rem;
        }

        /* Navbar Styles */
        .navbar {
            background: var(--primary-gradient);
            height: var(--navbar-height);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            transition: all 0.4s ease;
            padding: 0.5rem var(--section-spacing);
        }

        .navbar-brand {
            font-size: 1.4rem;
            transition: transform 0.3s ease;
            padding: 0.5rem 0;
        }

        .navbar-brand img {
            height: 45px;
            width: auto;
            margin-right: 0.75rem;
        }

        .navbar .nav-item {
            margin: 0 0.5rem;
        }

        .navbar .nav-link {
            padding: 0.5rem 1rem !important;
            color: white !important;
            position: relative;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #fff;
            transition: width 0.3s ease;
        }

        .navbar .nav-link:hover::after {
            width: 100%;
        }

        .navbar .dropdown-menu {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            margin-top: 0.5rem;
            padding: 0.5rem;
        }

        .navbar .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            border-radius: 4px;
        }

        .navbar .dropdown-item:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateX(5px);
        }

        .search-container {
            margin-left: var(--item-spacing);
        }

        .search-form input {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            color: white;
            padding: 0.5rem 1rem;
            width: 200px;
            transition: all 0.3s ease;
        }

        .search-form input:focus {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            width: 220px;
        }

        .search-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-form .btn-outline-light {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            margin-left: 0.5rem;
        }

        .cart-icon {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .cart-icon:hover {
            transform: scale(1.1);
        }

        /* Footer Styles */
        .footer {
            background: var(--primary-gradient);
            position: relative;
            padding: var(--section-spacing) 0;
            margin-top: var(--section-spacing);
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.05) 25%, transparent 25%),
                        linear-gradient(-45deg, rgba(255,255,255,0.05) 25%, transparent 25%);
            background-size: 30px 30px;
            opacity: 0.1;
        }

        .footer-content {
            position: relative;
            z-index: 1;
        }

        .footer h5 {
            font-size: 1.1rem;
            margin-bottom: 1.25rem;
            position: relative;
            display: inline-block;
        }

        .footer h5::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 40px;
            height: 2px;
            background: #ffc107;
            transition: width 0.3s ease;
        }

        .footer h5:hover::after {
            width: 100%;
        }

        .footer-links {
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            opacity: 0.9;
        }

        .footer a:hover {
            opacity: 1;
            transform: translateX(5px);
            color: #ffc107 !important;
        }

        .footer .social-links img {
            transition: transform 0.3s ease;
            opacity: 0.9;
        }

        .footer .social-links a:hover img {
            transform: scale(1.15);
            opacity: 1;
        }

        .footer-bottom {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar {
                padding: 0.5rem 1rem;
            }

            .navbar-collapse {
                background: var(--primary-gradient);
                border-radius: 8px;
                padding: 1rem;
                margin-top: 0.5rem;
            }

            .search-container {
                margin: 0.5rem 0;
            }

            .search-form {
                display: flex;
                width: 100%;
            }

            .search-form input {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            :root {
                --section-spacing: 1.5rem;
                --item-spacing: 0.75rem;
            }

            .navbar-brand img {
                height: 40px;
            }

            .footer {
                text-align: center;
            }

            .footer h5::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .footer-links {
                margin-bottom: 2rem;
            }

            .social-links {
                justify-content: center;
            }

            .footer a:hover {
                transform: translateX(0) scale(1.05);
            }
        }

        @media (max-width: 576px) {
            :root {
                --navbar-height: 60px;
                --section-spacing: 1rem;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }

            .navbar-brand img {
                height: 35px;
            }
        }
    </style>

</head>
<body>
    <div id="app">
        {{-- Navbar Modern --}}
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/HIMSI LOGO.png') }}" height="50" class="me-2">
                    <span class="fw-bold">SYSTEMA HIMSI</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">Tentang Kami</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown">
                                Produk
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('produk.merchandise') }}">Merchandise</a></li>
                                <li><a class="dropdown-item" href="{{ route('produk.makanan') }}">Makanan</a></li>
                                <li><a class="dropdown-item" href="{{ route('produk.minuman') }}">Minuman</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('review.index') }}">Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('kontak')}}">Kontak</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart cart-icon"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                    {{ Auth::check() ? App\Models\Cart::where('user_id', Auth::id())->sum('quantity') : '0' }}
                                </span>
                            </a>
                        </li>

                        <li class="nav-item search-container">
                            <form action="{{ route('search') }}" method="GET" class="d-flex search-form">
                                <input class="form-control me-2" type="search" name="query" placeholder="Cari produk..." aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @else
                            @if (Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('edit') }}">
                                        Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Main Content with Padding for Fixed Navbar --}}
        <main style="padding-top: calc(var(--navbar-height) + 20px);">
            @yield('content')
        </main>

        {{-- Modern Footer --}}
        <footer class="footer text-white pt-5 pb-4 mt-5">
            <div class="container">
                <div class="row g-4">
                    {{-- Brand Section --}}
                    <div class="col-lg-4">
                        <div class="pe-lg-4">
                            <h5 class="text-uppercase mb-4">
                                <img src="{{ asset('images/HIMSI LOGO.png') }}" height="40" class="me-2">
                                Systema HIMSI
                            </h5>
                            <p class="mb-4">Platform resmi Himpunan Mahasiswa Sistem Informasi untuk memenuhi kebutuhan merchandise, makanan, dan minuman Anda.</p>
                            <p>Jl. Minangkabau Barat No.50, RT.1/RW.1, Ps. Manggis, Kecamatan Setiabudi, Kota Jakarta Selatan, DKI Jakarta 12970</p>
                        </div>
                    </div>

                    {{-- Quick Links --}}
                    <div class="col-6 col-lg-2">
                        <h5 class="text-uppercase">Produk</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('produk.merchandise') }}" class="text-white text-decoration-none">Merchandise</a></li>
                            <li class="mb-2"><a href="{{ route('produk.makanan') }}" class="text-white text-decoration-none">Makanan</a></li>
                            <li class="mb-2"><a href="{{ route('produk.minuman') }}" class="text-white text-decoration-none">Minuman</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-lg-2">
                        <h5 class="text-uppercase">Navigasi</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{route('about')}}" class="text-white text-decoration-none">Tentang Kami</a></li>
                            <li class="mb-2"><a href="{{route('kontak')}}" class="text-white text-decoration-none">Kontak</a></li>
                            <li class="mb-2"><a href="{{ route('login') }}" class="text-white text-decoration-none">Login Member</a></li>
                            <li class="mb-2"><a href="{{ route('register') }}" class="text-white text-decoration-none">Register Member</a></li>
                        </ul>
                    </div>

                    {{-- Contact Info --}}
                    <div class="col-lg-4">
                        <h5 class="text-uppercase">Hubungi Kami</h5>
                        <ul class="list-unstyled social-links">
                            <li class="mb-3">
                                <a href="mailto:himsitelu.jkt@gmail.com" class="text-white text-decoration-none d-flex align-items-center">
                                    <img src="{{ asset('images/Email.png') }}" alt="Email" height="20" class="me-2">
                                    himsitelu.jkt@gmail.com
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="https://www.instagram.com/himsi_telujkt" target="_blank" class="text-white text-decoration-none d-flex align-items-center">
                                    <img src="{{ asset('images/Instagram.png') }}" alt="Instagram" height="20" class="me-2">
                                    himsi_telujkt
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="https://www.linkedin.com/company/himpunan-mahasiwa-sistem-informasi-jakarta/" target="_blank" class="text-white text-decoration-none d-flex align-items-center">
                                    <img src="{{ asset('images/Linkedin.jpg') }}" alt="LinkedIn" height="20" class="me-2">
                                    Himsi Tel-U Jakarta
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="my-4 bg-light opacity-25">

                {{-- Copyright --}}
                <div class="text-center">
                    <p class="mb-0 text-white-50 small">
                        Copyright &copy; {{ date('Y') }}
                        <a href="{{ url('/') }}" class="text-white text-decoration-none"><strong>Systema HIMSI</strong></a>
                        All Rights Reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(0, 47, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'linear-gradient(135deg, #002fff 0%, #0072FF 100%)';
                navbar.style.backdropFilter = 'blur(5px)';
            }
        });

        // SweetAlert Configuration
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-end'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-end'
                });
            @endif
        });
    </script>
</body>
</html>
