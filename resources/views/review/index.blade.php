@extends('layouts.frontend')
@section('title', 'Semua Review Produk')

@section('content')
<div class="container">
    <h1 class="my-4">Semua Review Produk</h1>

    {{-- ====> TOMBOL TAMBAH REVIEW BARU <==== --}}
    @auth {{-- Hanya tampil jika user login --}}
    <div class="mb-4">
        <a href="{{ route('review.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tulis Review Baru
        </a>
    </div>
    @else {{-- Jika user belum login --}}
    <div class="alert alert-info">
        Untuk menulis review, silakan <a href="{{ route('login') }}" class="alert-link">login</a> terlebih dahulu.
    </div>
    @endauth
    {{-- ======================================= --}}

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($reviews as $review_item)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $review_item->produk->name ?? 'Produk Tidak Diketahui' }}</h5>
                    @if ($review_item->produk && $review_item->produk->image)
                        <img src="{{ asset('storage/' . $review_item->produk->image) }}" class="card-img-top img-fluid" style="object-fit: cover; height: 200px;" alt="{{ $review_item->produk->name }}">
                    @else
                        <img src="{{ asset('images/default-product.png') }}" class="card-img-top img-fluid" style="object-fit: cover; height: 200px;" alt="Default Image">
                    @endif
                    <p class="card-text"> Review : {{ Str::limit($review_item->review, 100, "...") }}</p>
                    <p class="text-muted">
                        <strong>Rating: <span style="color: rgb(0, 110, 255);">{{ $review_item->rating }}/5 ⭐</span> oleh</strong>
                        <strong>{{ $review_item->user->name ?? 'Pengguna' }}</strong>
                    </p>
                    <a href="{{ route('review.show', $review_item->id) }}" class="btn btn-outline-primary btn-sm">Lihat Detail Review</a>
                </div>
            </div>
        </div>
        @empty
            <div class="col">
                <p class="text-center">Belum ada review.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $reviews->links() }}
    </div>
</div>
@endsection
