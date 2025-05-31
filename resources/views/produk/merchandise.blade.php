@extends('layouts.frontend')

@section('title', 'Produk Merchandise')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Produk Merchandise</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($produk as $item)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-product.png') }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text"><strong>Rp {{ number_format($item->price, 0, ',', '.') }}</strong></p>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text">Stok: {{ $item->stock }}</p>
                        <form action="{{ route('cart.add', $item) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $item->stock }}" class="form-control form-control-sm" style="width: 70px;">
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas fa-cart-plus"></i> Tambah
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada produk merchandise.</p>
        @endforelse
    </div>

    {{-- Pagination Links --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $produk->links() }}
    </div>
</div>
@endsection
