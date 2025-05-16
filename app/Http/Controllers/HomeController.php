<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kontak; // Import model Kontak
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::all(); // Fetch all products from the database
        $latest_reviews = \App\Models\Review::with('user', 'product') // Eager load user and product
            ->latest() // Order by latest
            ->take(3) // Limit to 3 latest reviews
            ->get(); // Fetch the reviews
        return view('dashboard', compact('products', 'latest_reviews')); // Pass products and latest reviews to the view
    }

    public function about()
    {
        return view('about'); // Render the about view
    }

    public function kontak()
    {
        return view('kontak'); // Render the kontak view (kontak.blade.php)
    }

    public function storeKontak(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'pesan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Buat instance model Kontak dan isi dengan data dari form
        $kontak = new Kontak();
        $kontak->nama = $request->input('nama');
        $kontak->email = $request->input('email');
        $kontak->no_hp = $request->input('no_hp');
        $kontak->pesan = $request->input('pesan');

        // Simpan data ke database
        $kontak->save();

        // Berikan feedback kepada pengguna (opsional)
        return Redirect::route('kontak')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
