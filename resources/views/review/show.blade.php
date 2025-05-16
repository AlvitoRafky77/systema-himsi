@extends('layouts.frontend')

@section('title', 'Detail Review')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm" style="border-radius: 12px;">
        <div class="card-body">
            <h2 class="card-title fw-bold mb-4">Detail Review</h2>
            @if ($review)
                <h5 class="card-subtitle mb-2 text-muted">Review oleh: {{ $review->user->name }}</h5>
                <p class="card-text">Produk: {{ $review->product->name }}</p>
                <p class="card-text">Rating: {{ $review->rating }}</p>
                <p class="card-text">Komentar: {{ $review->review }}</p>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
            @else
                <p class="card-text">Review tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection