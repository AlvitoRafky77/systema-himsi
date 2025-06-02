@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
    :root {
        --primary-color: #0072FF;
        --secondary-color: #182848;
        --accent-color: #FFD93D;
        --text-color: #2D3748;
        --border-radius: 15px;
    }

    .dashboard-container {
        padding: 2rem;
        background: linear-gradient(135deg, #f6f8fd 0%, #f1f4f9 100%);
        min-height: calc(100vh - 60px);
        position: relative;
        overflow: hidden;
    }

    .dashboard-container::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            rgba(0, 114, 255, 0.05) 0%,
            rgba(24, 40, 72, 0.05) 100%
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

    .dashboard-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: titleAppear 0.8s ease-out;
    }

    .dashboard-subtitle {
        color: #64748B;
        font-size: 1.1rem;
        animation: subtitleAppear 0.8s ease-out 0.2s both;
    }

    .action-button {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        position: relative;
        overflow: hidden;
    }

    .action-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .action-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 114, 255, 0.3);
        color: white;
        text-decoration: none;
    }

    .action-button:hover::before {
        left: 100%;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        position: relative;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        animation: cardAppear 0.6s ease-out;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 114, 255, 0.15);
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-title {
        color: var(--text-color);
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0;
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

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }

        .dashboard-title {
            font-size: 2rem;
        }

        .dashboard-subtitle {
            font-size: 1rem;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1 class="dashboard-title">Admin Dashboard</h1>
        <p class="dashboard-subtitle">Selamat datang di panel admin Systema HIMSI</p>
        <a href="{{ route('admin.products.index') }}" class="action-button">
            <i class="fas fa-box-open me-2"></i>
            Kelola Produk
        </a>
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <i class="fas fa-box stat-icon"></i>
            <h3 class="stat-title">Total Produk</h3>
            <p class="stat-value">{{ \App\Models\Produk::count() }}</p>
        </div>

        <div class="stat-card">
            <i class="fas fa-tags stat-icon"></i>
            <h3 class="stat-title">Kategori Produk</h3>
            <p class="stat-value">3</p>
        </div>

        <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <h3 class="stat-title">Total Pengguna</h3>
            <p class="stat-value">{{ \App\Models\User::count() }}</p>
        </div>
    </div>
</div>
@endsection
