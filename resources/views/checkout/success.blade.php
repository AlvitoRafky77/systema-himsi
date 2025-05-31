@extends('layouts.frontend')

@section('title', 'Checkout Berhasil')

@section('content')
<div class="container py-5 text-center">
    <div class="card shadow-sm">
        <div class="card-body py-5">
            <i class="fas fa-check-circle text-success mb-4" style="font-size: 5rem;"></i>
            <h1 class="mb-4">Terima Kasih!</h1>
            <p class="lead mb-4">Pesanan Anda telah berhasil diproses.</p>
            <p class="mb-4">Kami akan segera memproses pesanan Anda dan mengirimkan informasi lebih lanjut melalui email.</p>
            <div class="mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-primary me-2">
                    <i class="fas fa-home me-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
