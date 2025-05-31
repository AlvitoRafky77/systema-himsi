<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $products = Produk::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(9);

        return view('search', compact('products'));
    }
}
