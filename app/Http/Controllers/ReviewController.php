<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Model Produk Anda
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        // Ambil semua review, urutkan dari terbaru, dengan paginasi, dan eager load relasi
        $reviews = Review::with('user', 'produk') // Eager load user dan produk
                         ->latest()                // Urutkan dari terbaru
                         ->paginate(9);           // Paginasi (misal 9 review per halaman)

        return view('review.index', compact('reviews')); // Kirim data $reviews ke view
    }

    public function create() // Hapus parameter Produk $product
    {
        // Ambil semua produk untuk ditampilkan di dropdown
        // Urutkan berdasarkan nama agar mudah dicari
        $products = Produk::orderBy('name')->get();

        // Kirim daftar produk ke view
        return view('review.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('review.index')->with('success', 'Review Anda berhasil dikirim!');
    }

    public function review()
    {
        $reviews = \App\Models\Review::with('user', 'product')->get(); // Ambil semua review dengan relasi user dan product
        return view('review.show', compact('reviews')); // Kirim data review ke view
    }

    public function show(Review $review) // Terima objek Review
    {
        // Eager load relasi jika belum (meskipun $review sudah objeknya)
        $review->load('user', 'produk');
        return view('review.show', compact('review'));
    }
}
