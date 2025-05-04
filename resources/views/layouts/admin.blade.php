<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel - Systema HIMSI')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f8ff; /* AliceBlue */
            color: #212529;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: #007bff; /* Bootstrap Primary Blue */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
            font-weight: 500;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #d4e9ff !important; /* Lighter Blue */
        }

        footer {
            background: #007bff;
            color: #ffffff;
            padding: 15px 0;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .container {
            margin-top: 5px;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="app">
        {{-- Admin Navbar --}}
        <nav class="navbar navbar-expand-md shadow-sm justify-content-center align-items-center">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/HIMSI LOGO.png') }}" height="50" class="me-2 align-middle">
                    Admin Panel Systema HIMSI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
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
                            <a class="nav-link" href="{{ route('admin.contacts.index') }}">Pesan Kontak</a> {{-- Link Pesan Kontak --}}
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

        @if (session('success'))
            <div class="alert alert-success mt-3 container" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <main class="container">
            @yield('content')
        </main>

        {{-- Admin Footer --}}
        <footer class="text-center mt-4">
            <p>&copy; {{ date('Y') }} Systema HIMSI. All Rights Reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
