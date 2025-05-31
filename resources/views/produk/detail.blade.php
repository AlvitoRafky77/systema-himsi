@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            <i class="fas fa-home me-2"></i>
            Kembali ke Beranda
        </a>
    </div>

    <h1 class="my-4 text-center">Detail Produk</h1>

    <div class="row justify-content-center">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-img-top-wrapper" style="height: 200px; overflow: hidden;">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text mt-auto"><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="card-text"><strong>Stok:</strong> {{ $product->stock }}</p>

                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2 d-flex align-items-center">
                            @csrf
                            <input type="number"
                                   name="quantity"
                                   class="form-control me-2"
                                   value="1"
                                   min="1"
                                   max="{{ $product->stock }}"
                                   style="width: 70px;"
                                   required>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-shopping-cart"></i> Tambah
                            </button>
                        </form>
                    @else
                        <div class="alert alert-warning mt-2 mb-0">
                            Stok habis
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
