<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $review = Review::latest()->first(); // Ambil review terbaru
        return view('layouts.frontend', compact('review'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review berhasil dikirim.');
    }

    public function review()
    {
        $reviews = \App\Models\Review::with('user', 'product')->get(); // Ambil semua review dengan relasi user dan product
        return view('review.show', compact('reviews')); // Kirim data review ke view
    }

    public function show($id)
    {
        $review = Review::findOrFail($id); // Ambil review berdasarkan ID atau tampilkan 404 jika tidak ditemukan

        return view('review.show', compact('review')); // Kirim data review ke view
    }
}