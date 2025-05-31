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
            <div class="d-grid gap-2">
                <a href="https://wa.me/your-number?text=Saya tertarik dengan produk {{ $produk->name }}"
                   class="btn btn-success" target="_blank">
                    <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                </a>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    {{-- Reviews Section --}}
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Review Produk</h3>
            @if($produk->reviews->count() > 0)
                @foreach($produk->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">{{ $review->user->name }}</h5>
                                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                            </div>
                            <p class="card-text">{{ $review->comment }}</p>
                            <div class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    Belum ada review untuk produk ini.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
