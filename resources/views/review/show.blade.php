@extends('layouts.frontend')

@section('title', 'Detail Review')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm" style="border-radius: 12px;">
        <div class="card-body">
            <h2 class="card-title fw-bold mb-4">Detail Review</h2>
            @if (isset($review) && $review) {{-- Pastikan $review ada --}}
                <h5 class="card-subtitle mb-2 text-muted">Review oleh: {{ $review->user->name ?? 'Pengguna' }}</h5>
                <p class="card-text">Produk: {{ $review->produk->name ?? 'Produk Tidak Diketahui' }}</p>
                <p class="card-text">
                    Rating: {{ $review->rating }}/5
                    <span class="ms-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                    </span>
                </p>
                <p class="card-text">Komentar: {{ $review->review }}</p>
                <hr>
                <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Kembali</a>
                {{-- Link "Tambah Review" ini lebih cocok ada di halaman detail PRODUK, bukan detail REVIEW --}}
                {{-- Jika produknya ada, kita bisa link ke form create review untuk produk tersebut --}}
                @if(isset($review->product))
                <a href="{{ route('review.create', ['product' => $review->product->id]) }}" class="btn btn-primary ms-2">Tulis Review untuk Produk Ini</a>
                @endif
            @else
                <p class="card-text">Review tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection

{{-- Anda perlu Font Awesome untuk ikon bintang fas fa-star / far fa-star --}}
