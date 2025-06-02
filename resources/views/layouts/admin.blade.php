<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel - Systema HIMSI')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: linear-gradient(135deg, #0072FF 0%, #182848 100%);
            padding: 1rem 0;
            position: relative;
            z-index: 1000;
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #d4e9ff !important;
            transform: translateY(-1px);
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        footer {
            background: linear-gradient(135deg, #0072FF 0%, #182848 100%);
            color: #ffffff;
            padding: 15px 0;
            position: relative;
            width: 100%;
            z-index: 1000;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .alert {
            border-radius: 15px;
            margin: 1rem;
        }

        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 100%;
            padding: 0;
            margin: 0;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1rem;
            }

            .navbar-brand img {
                height: 40px;
            }
        }
    </style>

    @yield('styles')
</head>
<body>
    <div id="app">
        {{-- Admin Navbar --}}
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/HIMSI LOGO.png') }}" height="50" class="me-2 align-middle">
                    Admin Panel Systema HIMSI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Dashboard Utama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.products.index') }}">Kelola Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.contacts.index') }}">Pesan Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            @yield('content')
        </main>

        {{-- Admin Footer --}}
        <footer class="text-center">
            <p>&copy; {{ date('Y') }} Systema HIMSI. All Rights Reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
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

    @yield('scripts')
</body>
</html>
