<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('produk')
            ->get();

        // Cek jika keranjang kosong
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong!');
        }

        $total = $cartItems->sum(function($item) {
            return $item->produk->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'metode_pembayaran' => 'required|in:transfer_bank,cod'
        ]);

        try {
            DB::beginTransaction();

            // Ambil semua item di keranjang
            $cartItems = Cart::where('user_id', Auth::id())
                ->with('produk')
                ->get();

            // Cek stok setiap produk
            foreach ($cartItems as $item) {
                if ($item->produk->stock < $item->quantity) {
                    throw new \Exception("Stok produk {$item->produk->name} tidak mencukupi!");
                }
            }

            // Kurangi stok produk
            foreach ($cartItems as $item) {
                $produk = $item->produk;
                $produk->stock -= $item->quantity;
                $produk->save();
            }

            // Hapus semua item di keranjang
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();
            return redirect()->route('checkout.success')->with('success', 'Pesanan Anda berhasil diproses!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function success()
    {
        return view('checkout.success');
    }
}
