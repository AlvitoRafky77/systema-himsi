<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('produk')
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->produk->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Produk $produk, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $produk->stock,
        ]);

        // Cek apakah produk sudah ada di keranjang
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('produk_id', $produk->id)
            ->first();

        if ($existingCart) {
            // Update quantity jika produk sudah ada
            $newQuantity = $existingCart->quantity + $request->quantity;

            // Cek apakah total quantity tidak melebihi stok
            if ($newQuantity > $produk->stock) {
                return redirect()->back()->with('error', 'Total quantity melebihi stok yang tersedia!');
            }

            $existingCart->quantity = $newQuantity;
            $existingCart->save();

            return redirect()->back()->with('success', $produk->name . ' berhasil ditambahkan ke keranjang (Total: ' . $newQuantity . ')');
        } else {
            // Buat item baru di keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'produk_id' => $produk->id,
                'quantity' => $request->quantity
            ]);

            return redirect()->back()->with('success', $produk->name . ' berhasil ditambahkan ke keranjang');
        }
    }

    public function update(Cart $cart, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cart->produk->stock,
        ]);

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diupdate');
    }

    public function remove(Cart $cart)
    {
        $productName = $cart->produk->name;
        $cart->delete();

        return redirect()->route('cart.index')->with('success', $productName . ' berhasil dihapus dari keranjang');
    }
}
