@extends('layouts.frontend')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Keranjang Belanja</h1>
    @if($cartItems->isEmpty())
        <div class="alert alert-info">
            <h4 class="alert-heading">Keranjang Kosong!</h4>
            <p>Anda belum menambahkan produk apapun ke keranjang.</p>
            <hr>
            <p class="mb-0">Silakan lihat produk kami:</p>
            <div class="mt-3">
                <a href="{{ route('produk.merchandise') }}" class="btn btn-outline-primary me-2">Merchandise</a>
                <a href="{{ route('produk.makanan') }}" class="btn btn-outline-primary me-2">Makanan</a>
                <a href="{{ route('produk.minuman') }}" class="btn btn-outline-primary">Minuman</a>
            </div>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->produk->image ? asset('storage/' . $item->produk->image) : asset('images/default-product.png') }}"
                                                 alt="{{ $item->produk->name }}"
                                                 class="img-thumbnail me-3"
                                                 style="width: 80px; height: 80px; object-fit: cover;">
                                            <div>
                                                <h5 class="mb-0">{{ $item->produk->name }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($item->produk->price, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number"
                                                   name="quantity"
                                                   value="{{ $item->quantity }}"
                                                   min="1"
                                                   class="form-control"
                                                   style="width: 80px;">
                                            <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>Rp {{ number_format($item->produk->price * $item->quantity, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Total:</td>
                                <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('checkout') }}" class="btn btn-primary">
                Lanjut ke Pembayaran
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    @endif
</div>
@endsection
