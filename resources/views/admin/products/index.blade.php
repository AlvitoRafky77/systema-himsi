@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('styles')
<style>
    :root {
        --primary-color: #0072FF;
        --secondary-color: #182848;
        --accent-color: #FFD93D;
        --text-color: #2D3748;
        --border-radius: 15px;
    }

    .products-container {
        padding: 2rem;
        background: #f8f8f8;
        min-height: calc(100vh - 60px);
        position: relative;
        overflow: hidden;
    }

    .products-container::before {
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
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--secondary-color);
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        animation: titleAppear 0.8s ease-out;
    }

    .add-product-btn {
        background: #005AD4;
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 90, 212, 0.2);
    }

    .add-product-btn i {
        font-size: 1.1rem;
    }

    .add-product-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 90, 212, 0.4);
        color: white;
        text-decoration: none;
        background: #004BB1;
    }

    .products-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        animation: cardAppear 0.6s ease-out;
    }

    .table-wrapper {
        overflow-x: auto;
        margin: -0.5rem;
        padding: 0.5rem;
    }

    .products-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .products-table th {
        background: #005AD4;
        color: white;
        padding: 1rem;
        font-weight: 600;
        text-align: left;
        border: none;
        white-space: nowrap;
    }

    .products-table th:first-child {
        border-top-left-radius: 10px;
    }

    .products-table th:last-child {
        border-top-right-radius: 10px;
        text-align: center;
    }

    .products-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 90, 212, 0.1);
        transition: all 0.3s ease;
        vertical-align: middle;
    }

    .products-table tr:hover td {
        background: rgba(0, 90, 212, 0.05);
    }

    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .product-image:hover {
        transform: scale(3);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .actions-cell {
        text-align: center;
        white-space: nowrap;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin: 0 0.2rem;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-edit {
        background: #E67E22;
        color: white;
        border: none;
        box-shadow: 0 4px 15px rgba(230, 126, 34, 0.2);
    }

    .btn-delete {
        background: #E74C3C;
        color: white;
        border: none;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
    }

    .btn-action:hover {
        transform: translateY(-2px);
        color: white;
    }

    .btn-edit:hover {
        box-shadow: 0 4px 15px rgba(230, 126, 34, 0.4);
        background: #D35400;
    }

    .btn-delete:hover {
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        background: #C0392B;
    }

    .description-cell {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .price-cell {
        white-space: nowrap;
        font-weight: 600;
        color: #005AD4;
    }

    .stock-cell {
        font-weight: 600;
        text-align: center;
        width: 80px;
    }

    .type-cell {
        width: 120px;
    }

    @keyframes cardAppear {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes titleAppear {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 768px) {
        .products-container {
            padding: 1rem;
        }

        .page-title {
            font-size: 2rem;
        }

        .products-card {
            padding: 1rem;
        }

        .table-wrapper {
            margin: -0.5rem;
            padding: 0.5rem;
        }

        .btn-action {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        .description-cell {
            max-width: 150px;
        }
    }
</style>
@endsection

@section('content')
<div class="products-container">
    <div class="content-wrapper">
        <h1 class="page-title">Kelola Produk</h1>

        <a href="{{ route('admin.products.create') }}" class="add-product-btn">
            <i class="fas fa-plus-circle"></i>
            Tambah Produk
        </a>

        <div class="products-card">
            <div class="table-wrapper">
                <table class="products-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td class="type-cell">{{ $product->type }}</td>
                                <td class="price-cell">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="stock-cell">{{ $product->stock }}</td>
                                <td class="description-cell" title="{{ $product->description }}">
                                    {{ Str::limit($product->description, 50) }}
                                </td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="product-image">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="actions-cell">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                          method="POST"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-action btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
