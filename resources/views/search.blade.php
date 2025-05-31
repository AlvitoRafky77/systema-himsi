@extends('layouts.frontend')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Hasil Pencarian untuk "{{ request('query') }}"</h2>

            @if($products->isEmpty())
                <div class="alert alert-info">
                    <h4 class="alert-heading">Tidak ditemukan produk yang sesuai!</h4>
                    <p>Silakan coba dengan kata kunci lain atau kunjungi kategori produk kami:</p>
                    <hr>
                    <div class="d-flex gap-2">
                        <a href="{{ route('produk.makanan') }}" class="btn btn-outline-primary">Makanan</a>
                        <a href="{{ route('produk.minuman') }}" class="btn btn-outline-primary">Minuman</a>
                        <a href="{{ route('produk.merchandise') }}" class="btn btn-outline-primary">Merchandise</a>
                    </div>
                </div>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($products as $product)
                        <div class="col">
                            <div class="card h-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-muted">
                                        Kategori:
                                        @if($product->type == 'food')
                                            Makanan
                                        @elseif($product->type == 'drink')
                                            Minuman
                                        @else
                                            Merchandise
                                        @endif
                                    </p>
                                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                    <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                                    <a href="{{ route('produk.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $products->appends(['query' => request('query')])->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection