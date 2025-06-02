@extends('layouts.frontend')

@section('title', 'Register')

@section('styles')
<style>
    :root {
        --primary-color: #0072FF;
        --secondary-color: #182848;
        --accent-color: #FFD93D;
        --text-color: #2D3748;
        --border-radius: 15px;
    }

    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        background: linear-gradient(135deg, #f6f8fd 0%, #f1f4f9 100%);
        position: relative;
        overflow: hidden;
    }

    .auth-container::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            rgba(75, 108, 183, 0.1) 0%,
            rgba(24, 40, 72, 0.1) 100%
        );
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg) translate(-50%, -50%);
        }
        to {
            transform: rotate(360deg) translate(-50%, -50%);
        }
    }

    .auth-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 3rem 2rem;
        width: 100%;
        max-width: 500px;
        position: relative;
        z-index: 1;
        animation: cardAppear 0.6s ease-out;
    }

    @keyframes cardAppear {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .auth-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .auth-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: titleAppear 0.8s ease-out;
    }

    .auth-subtitle {
        color: #64748B;
        font-size: 1.1rem;
        animation: subtitleAppear 0.8s ease-out 0.2s both;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
        animation: formAppear 0.8s ease-out;
    }

    @keyframes formAppear {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-color);
        font-weight: 600;
        font-size: 1rem;
    }

    .form-control {
        width: 100%;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        border: 2px solid #E2E8F0;
        border-radius: var(--border-radius);
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(75, 108, 183, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: #A0AEC0;
    }

    .auth-button {
        width: 100%;
        padding: 1rem;
        border: none;
        border-radius: var(--border-radius);
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        margin-top: 1rem;
    }

    .auth-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .auth-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(75, 108, 183, 0.3);
    }

    .auth-button:hover::before {
        left: 100%;
    }

    .auth-links {
        margin-top: 2rem;
        text-align: center;
        animation: linksAppear 0.8s ease-out 0.4s both;
    }

    @keyframes linksAppear {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .auth-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .auth-link:hover {
        color: var(--secondary-color);
        text-decoration: none;
    }

    .floating-shapes div {
        position: absolute;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        opacity: 0.1;
    }

    .shape1 { top: 20%; left: 10%; animation: float 8s infinite; }
    .shape2 { top: 60%; right: 10%; animation: float 10s infinite; }
    .shape3 { bottom: 20%; left: 20%; animation: float 12s infinite; }
    .shape4 { bottom: 40%; right: 20%; animation: float 9s infinite; }

    @keyframes float {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, -20px); }
    }

    .invalid-feedback {
        color: #DC2626;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        animation: errorAppear 0.3s ease-out;
    }

    @keyframes errorAppear {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #A0AEC0;
        cursor: pointer;
        padding: 0.5rem;
        transition: all 0.3s ease;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    @media (max-width: 768px) {
        .auth-container {
            padding: 1rem;
        }

        .auth-card {
            padding: 2rem 1.5rem;
        }

        .auth-title {
            font-size: 2rem;
        }

        .auth-subtitle {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="auth-container">
    <div class="floating-shapes">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="shape3"></div>
        <div class="shape4"></div>
    </div>

    <div class="auth-card">
        <div class="auth-header">
            <h1 class="auth-title">Daftar Akun</h1>
            <p class="auth-subtitle">Bergabunglah dengan komunitas kami</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autocomplete="name"
                       autofocus
                       placeholder="Masukkan nama lengkap Anda">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       placeholder="Masukkan email Anda">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="position-relative">
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password"
                           name="password"
                           required
                           autocomplete="new-password"
                           placeholder="Masukkan password Anda">
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="position-relative">
                    <input type="password"
                           class="form-control"
                           id="password_confirmation"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           placeholder="Masukkan ulang password Anda">
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="auth-button">
                <i class="fas fa-user-plus me-2"></i>
                Daftar
            </button>

            <div class="auth-links">
                <p>
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="auth-link">Masuk sekarang</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = event.currentTarget.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
