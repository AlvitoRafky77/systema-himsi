<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Pencarian Produk berdasarkan nama, deskripsi, dan kategori
        $products = Produk::where(function($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
              ->orWhere('description', 'like', "%{$query}%");
        })
        ->when(strtolower($query) === 'makanan', function($q) {
            return $q->where('type', 'food');
        })
        ->when(strtolower($query) === 'minuman', function($q) {
            return $q->where('type', 'drink');
        })
        ->when(strtolower($query) === 'merchandise', function($q) {
            return $q->where('type', 'merchandise');
        })
        ->paginate(9);

        return view('search', compact('products'));
    }
}
