@extends('layouts.frontend')
@section('title', 'Tulis Review Baru')

@section('content')
<div class="container">
    <h1 class="mb-4">Tulis Review Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        {{-- ====> DROPDOWN UNTUK MEMILIH PRODUK <==== --}}
        <div class="mb-3">
            <label for="product_id" class="form-label">Pilih Produk yang Direview <span class="text-danger">*</span></label>
            <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                <option value="" selected disabled>-- Pilih Produk --</option>
                @foreach ($products as $product_item)
                    <option value="{{ $product_item->id }}" {{ old('product_id') == $product_item->id ? 'selected' : '' }}>
                        {{ $product_item->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- ========================================== --}}

        <div class="mb-3">
            <label for="rating" class="form-label">Rating Anda <span class="text-danger">*</span></label>
            <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                <option value="" disabled {{ old('rating') ? '' : 'selected' }}>Pilih rating (1-5)</option>
                <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 - Sangat Buruk</option>
                <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 - Buruk</option>
                <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 - Cukup</option>
                <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 - Baik</option>
                <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 - Sangat Baik</option>
            </select>
            @error('rating') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="review" class="form-label">Isi Review <span class="text-danger">*</span></label>
            <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review" rows="4" placeholder="Tulis review Anda" required>{{ old('review') }}</textarea>
            @error('review') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Kirim Review</button>
        <a href="{{ route('review.index') }}" class="btn btn-danger">Batal</a> {{-- Tombol batal kembali ke index review --}}
        <a href="{{ route('review.index') }}" class="btn btn-warning">Kembali ke Review</a> {{-- Tombol batal kembali ke index produk --}}
    </form>
</div>
@endsection
