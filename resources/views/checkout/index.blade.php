@extends('layouts.frontend')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Checkout</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">Detail Pengiriman</h5>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', Auth::user()->name) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Metode Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="transfer_bank" value="transfer_bank" {{ old('metode_pembayaran') == 'transfer_bank' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="transfer_bank">
                                    Transfer Bank
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="cod" value="cod" {{ old('metode_pembayaran') == 'cod' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cod">
                                    Cash on Delivery (COD)
                                </label>
                            </div>
                            @error('metode_pembayaran')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Proses Pesanan
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Ringkasan Pesanan</h5>

                    @foreach($cartItems as $item)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-0">{{ $item->produk->name }}</h6>
                                <small class="text-muted">{{ $item->quantity }} x Rp {{ number_format($item->produk->price, 0, ',', '.') }}</small>
                            </div>
                            <div>
                                <strong>Rp {{ number_format($item->produk->price * $item->quantity, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Total</h5>
                        <h5 class="mb-0">Rp {{ number_format($total, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
