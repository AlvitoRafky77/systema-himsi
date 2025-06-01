<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel - Systema HIMSI')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            position: relative;
            bottom: 0;
            width: 100%;
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
        html, body {
            height: 100%;
        }
        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
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

        {{-- Hapus alert Bootstrap untuk pesan sukses --}}
        {{-- @if (session('success'))
            <div class="alert alert-success mt-3 container" role="alert">
                {{ session('success') }}
            </div>
        @endif --}}
        {{-- Pesan error validasi (jika ada) tetap sebagai alert Bootstrap --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-3 container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert untuk pesan sukses
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

            // SweetAlert untuk pesan error umum
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
