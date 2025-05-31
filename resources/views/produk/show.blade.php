@extends('layouts.frontend')

@section('title', $produk->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @if($produk->image)
                <img src="{{ asset('storage/' . $produk->image) }}" class="img-fluid rounded" alt="{{ $produk->name }}">
            @else
                <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" alt="No Image">
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="mb-4">{{ $produk->name }}</h1>
            <p class="text-muted mb-4">Kategori: {{ $produk->category }}</p>
            <h3 class="text-primary mb-4">Rp {{ number_format($produk->price, 0, ',', '.') }}</h3>
            <div class="mb-4">
                <h5>Deskripsi Produk:</h5>
                <p>{{ $produk->description }}</p>
            </div>
            <div class="mb-4">
                <h5>Stok:</h5>
                <p>{{ $produk->stock }} unit</p>
            </div>

            @if($produk->stock > 0)
                <form action="{{ route('cart.add', $produk->id) }}" method="POST" class="mb-3 d-flex align-items-center">
                    @csrf
                    <input type="number"
                           name="quantity"
                           class="form-control me-2"
                           value="1"
                           min="1"
                           max="{{ $produk->stock }}"
                           style="width: 70px;"
                           required>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-shopping-cart"></i> Tambah
                    </button>
                </form>
            @else
                <div class="alert alert-warning mb-3">
                    Stok produk habis
                </div>
            @endif

            <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>

    {{-- Reviews Section --}}
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Review Produk</h3>
                @auth
                    <a href="{{ route('review.create', ['product_id' => $produk->id]) }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tulis Review
                    </a>
                @endauth
            </div>

            @if($produk->reviews->count() > 0)
                @foreach($produk->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h5 class="card-title mb-1">{{ $review->user->name }}</h5>
                                    <div class="text-warning mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                            </div>
                            <p class="card-text">{{ $review->review }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Belum ada review untuk produk ini.
                    @auth
                        Jadilah yang pertama memberikan review!
                    @else
                        <a href="{{ route('login') }}" class="alert-link">Login</a> untuk memberikan review.
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
