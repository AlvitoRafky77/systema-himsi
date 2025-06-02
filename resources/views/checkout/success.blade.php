@extends('layouts.frontend')

@section('title', 'Pesanan Berhasil')

@section('styles')
<style>
    :root {
        --success-color: #10B981;
        --primary-color: #4B6CB7;
        --secondary-color: #182848;
        --text-color: #2D3748;
        --border-radius: 15px;
    }

    .success-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        background: linear-gradient(135deg, #f6f8fd 0%, #f1f4f9 100%);
    }

    .success-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 3rem 2rem;
        text-align: center;
        max-width: 500px;
        width: 100%;
        position: relative;
        overflow: hidden;
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

    .success-icon {
        width: 100px;
        height: 100px;
        background: var(--success-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        position: relative;
        animation: iconPop 0.5s ease-out 0.3s both;
    }

    @keyframes iconPop {
        from {
            transform: scale(0);
        }
        50% {
            transform: scale(1.2);
        }
        to {
            transform: scale(1);
        }
    }

    .success-icon::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: var(--success-color);
        opacity: 0.2;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 0.2;
        }
        50% {
            transform: scale(1.5);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 0.2;
        }
    }

    .success-icon i {
        color: white;
        font-size: 3rem;
    }

    .success-title {
        color: var(--text-color);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: titleAppear 0.8s ease-out 0.5s both;
    }

    @keyframes titleAppear {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .success-message {
        color: #64748B;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
        animation: messageAppear 0.8s ease-out 0.7s both;
    }

    @keyframes messageAppear {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .back-button {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: buttonAppear 0.8s ease-out 0.9s both;
    }

    @keyframes buttonAppear {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .back-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(75, 108, 183, 0.3);
        color: white;
        text-decoration: none;
    }

    .back-button:hover::before {
        left: 100%;
    }

    .success-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 0;
    }

    .particle {
        position: absolute;
        width: 10px;
        height: 10px;
        background: var(--success-color);
        border-radius: 50%;
        opacity: 0;
        animation: particleAnimation 1s ease-out forwards;
    }

    @keyframes particleAnimation {
        0% {
            transform: translate(0, 0) scale(1);
            opacity: 1;
        }
        100% {
            transform: translate(var(--tx), var(--ty)) scale(0);
            opacity: 0;
        }
    }

    @media (max-width: 768px) {
        .success-container {
            padding: 1rem;
        }

        .success-card {
            padding: 2rem 1.5rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
        }

        .success-icon i {
            font-size: 2.5rem;
        }

        .success-title {
            font-size: 2rem;
        }

        .success-message {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="success-container">
    <div class="success-card">
        <div class="success-particles" id="particles"></div>
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h1 class="success-title">Terima Kasih!</h1>
        <p class="success-message">
            Pesanan Anda telah berhasil diproses.<br>
            Kami akan segera memproses pesanan Anda dan mengirimkan informasi lebih lanjut melalui email.
        </p>
        <a href="{{ route('home') }}" class="back-button">
            <i class="fas fa-home me-2"></i>
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const particlesContainer = document.getElementById('particles');
        const numberOfParticles = 20;

        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';

            // Random position around success icon
            const angle = Math.random() * Math.PI * 2;
            const radius = 50 + Math.random() * 20;
            const startX = Math.cos(angle) * radius;
            const startY = Math.sin(angle) * radius;

            // Random end position
            const tx = (Math.random() - 0.5) * 200;
            const ty = (Math.random() - 0.5) * 200;

            particle.style.setProperty('--tx', `${tx}px`);
            particle.style.setProperty('--ty', `${ty}px`);
            particle.style.left = `calc(50% + ${startX}px)`;
            particle.style.top = `calc(30% + ${startY}px)`;

            particlesContainer.appendChild(particle);

            // Remove particle after animation
            setTimeout(() => {
                particle.remove();
            }, 1000);
        }

        // Initial burst of particles
        for (let i = 0; i < numberOfParticles; i++) {
            setTimeout(createParticle, i * 50);
        }

        // Create new particles periodically
        setInterval(() => {
            createParticle();
        }, 500);
    });
</script>
@endsection
