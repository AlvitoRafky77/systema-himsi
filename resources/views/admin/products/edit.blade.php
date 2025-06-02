@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('styles')
<style>
    .edit-container {
        padding: 2rem;
        background: #f8f8f8;
        min-height: calc(100vh - 60px);
        position: relative;
        overflow: hidden;
    }

    .edit-container::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: rgba(0, 114, 255, 0.05);
        z-index: 0;
    }

    .content-wrapper {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: var(--secondary-color);
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #2D3748;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 1px solid rgba(0, 90, 212, 0.2);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    select.form-control {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23005AD4' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
        padding-right: 3rem;
        cursor: pointer;
    }

    select.form-control option {
        background: white;
        color: #2D3748;
        padding: 1rem;
        font-size: 1rem;
    }

    select.form-control option:hover,
    select.form-control option:focus,
    select.form-control option:active,
    select.form-control option:checked {
        background: linear-gradient(0deg, rgba(0, 90, 212, 0.1) 0%, rgba(0, 90, 212, 0.1) 100%);
    }

    select.form-control:hover {
        border-color: #005AD4;
        box-shadow: 0 2px 8px rgba(0, 90, 212, 0.1);
    }

    @media (hover: hover) {
        select.form-control option:hover {
            background-color: rgba(0, 90, 212, 0.1);
        }
    }

    .btn-submit {
        background: #005AD4;
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .btn-submit:hover {
        background: #004BB1;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 90, 212, 0.2);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .preview-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-top: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .preview-image:hover {
        transform: scale(1.05);
    }

    .image-preview-container {
        margin-top: 1rem;
    }
</style>
@endsection

@section('content')
<div class="edit-container">
    <div class="content-wrapper">
        <h1 class="page-title">Edit Produk</h1>

        <div class="form-card">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="type" class="form-label">Tipe Produk</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="Merchandise" {{ $product->type == 'Merchandise' ? 'selected' : '' }}>Merchandise</option>
                        <option value="Food" {{ $product->type == 'Food' ? 'selected' : '' }}>Makanan</option>
                        <option value="Drink" {{ $product->type == 'Drink' ? 'selected' : '' }}>Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>
                <div class="form-group">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    @if ($product->image)
                        <div class="image-preview-container">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="preview-image">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
