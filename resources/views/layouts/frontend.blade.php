<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Systema HIMSI')</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        .navbar .nav-item {
            margin: 0 8px;
        }
        .navbar .nav-link {
            padding: 8px 12px !important;
        }
        .navbar .dropdown-menu {
            margin-top: 8px;
        }
        .navbar-nav .search-form {
            margin-left: 15px;
        }
        .cart-icon {
            font-size: 1.2rem;
            margin-right: 5px;
        }
        .navbar .btn-outline-light {
            padding: 6px 12px;
        }
        .navbar-brand {
            margin-right: 30px;
        }
        .search-container {
            margin: 0 15px;
        }
    </style>

</head>
<body>
    <div id="app">
        {{-- Menggunakan kelas Bootstrap untuk styling Navbar --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm"> {{-- bg-primary (biru) atau bg-dark (hitam) --}}
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}"> {{-- fw-bold untuk tebal --}}
                    <img src="{{ asset('images/HIMSI LOGO.png') }}" height="50" class="me-2 align-middle"> {{-- Sesuaikan tinggi & alignment logo --}}
                    SYSTEMA HIMSI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('about')}}">Tentang Kami</a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                            <ul class="dropdown-menu" aria-labelledby="produkDropdown">
                                <li><a class="dropdown-item" href="{{ route('produk.merchandise') }}">Merchandise</a></li>
                                <li><a class="dropdown-item" href="{{ route('produk.makanan') }}">Makanan</a></li>
                                <li><a class="dropdown-item" href="{{ route('produk.minuman') }}">Minuman</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('review.index') }}">Review</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('kontak')}}">Kontak</a> </li>

                        {{-- Keranjang Belanja --}}
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart cart-icon"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                    {{ Auth::check() ? App\Models\Cart::where('user_id', Auth::id())->sum('quantity') : '0' }}
                                </span>
                            </a>
                        </li>

                        {{-- Search Form --}}
                        <li class="nav-item search-container">
                            <form action="{{ route('search') }}" method="GET" class="d-flex search-form">
                                <input class="form-control me-2" type="search" name="query" placeholder="Cari produk..." aria-label="Search" style="width: 200px;">
                                <button class="btn btn-outline-light" type="submit">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </form>
                        </li>

                        @guest
                            <li class="nav-item">
                                {{-- Link login sederhana, warna diatur navbar-dark --}}
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @else
                            @if (Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- Link Edit Profile ditambahkan --}}
                                    <a class="dropdown-item" href="{{ route('edit') }}">
                                        Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        {{-- Menggunakan kelas Bootstrap untuk styling Footer --}}
        <footer class="footer bg-blue text-white pt-5 pb-4 mt-5"> {{-- bg-dark atau warna custom dg kelas lain --}}
            <div class="container text-md-left">
                <div class="row text-md-left">
                    {{-- Kolom 1: Brand --}}
                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 fw-bold text-warning"> {{-- Judul pakai text-warning --}}
                            <img src="{{ asset('images/HIMSI LOGO.png') }}" height="40" class="me-2"> Systema HIMSI
                        </h5>
                        <p>  Platform resmi Himpunan Mahasiswa Sistem Informasi untuk memenuhi kebutuhan merchandise, makanan, dan minuman Anda.</p>
                        <p> Jl. Minangkabau Barat No.50, RT.1/RW.1, Ps. Manggis, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12970</p>
                    </div>

                    {{-- Kolom 2: Produk --}}
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 fw-bold text-warning">Produk</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"> <a href="{{ route('produk.merchandise') }}" class="text-white text-decoration-none">Merchandise</a> </li>
                            <li class="mb-2"> <a href="{{ route('produk.makanan') }}" class="text-white text-decoration-none">Makanan</a> </li>
                            <li class="mb-2"> <a href="{{ route('produk.minuman') }}" class="text-white text-decoration-none">Minuman</a> </li>
                        </ul>
                    </div>

                    {{-- Kolom 3: Navigasi --}}
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 fw-bold text-warning">Navigasi</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"> <a href="{{route('about')}}" class="text-white text-decoration-none">Tentang Kami</a> </li>
                            <li class="mb-2"> <a href="{{route('kontak')}}" class="text-white text-decoration-none">Kontak</a> </li>
                            <li class="mb-2"> <a href="{{ route('login') }}" class="text-white text-decoration-none">Login Member</a> </li>
                            <li class="mb-2"> <a href="{{ route('register') }}" class="text-white text-decoration-none">Register Member</a> </li>
                        </ul>
                    </div>

                    {{-- Kolom 4: Hubungi Kami --}}
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 fw-bold text-warning">Hubungi Kami</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2 d-flex align-items-center"> {{-- Pakai flexbox untuk alignment ikon+teks --}}
                                <img src="{{ asset('images/Email.png') }}" alt="Email" height="20" class="me-2">
                                <a href="mailto:himsitelu.jkt@gmail.com" class="text-white text-decoration-none">himsitelu.jkt@gmail.com</a>
                            </li>
                             <li class="mb-2 d-flex align-items-center">
                                <img src="{{ asset('images/Instagram.png') }}" alt="Instagram" height="20" class="me-2">
                                <a href="https://www.instagram.com/himsi_telujkt?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="text-white text-decoration-none">himsi_telujkt</a>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <img src="{{ asset('images/Linkedin.jpg') }}" alt="LinkedIn" height="20" class="me-2">
                                <a href="https://www.linkedin.com/company/himpunan-mahasiwa-sistem-informasi-jakarta/" target="_blank" class="text-white text-decoration-none">Himsi Tel-U Jakarta</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="mb-4 mt-4 bg-secondary"> {{-- Garis pemisah --}}

                {{-- Copyright --}}
                <div class="row align-items-center">
                    <div class="col-12">
                        <p class="text-center text-white-50 small"> {{-- Teks copyright lebih kecil & redup --}}
                            Copyright &copy; {{ date('Y') }}
                            <a href="{{ url('/') }}" class="text-white text-decoration-none"><strong>Systema HIMSI</strong></a>. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
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
    </script>
    @endif

    @if(session('error'))
    <script>
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
    </script>
    @endif
</body>
</html>

