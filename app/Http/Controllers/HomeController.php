<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kontak; // Pastikan model Kontak diimpor
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk logging error

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::all();
        $latest_reviews = \App\Models\Review::with('user', 'produk')
            ->latest()
            ->take(3)
            ->get();
        return view('dashboard', compact('products', 'latest_reviews'));
    }

    public function about()
    {
        return view('about');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function storeKontak(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'pesan' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Mengirimkan pesan error spesifik ke session jika ada
            // Menggunakan session()->flash() agar pesan hanya tersedia untuk request berikutnya
            if ($validator->errors()->has('nama')) {
                session()->flash('namaError', $validator->errors()->first('nama'));
            }
            if ($validator->errors()->has('email')) {
                session()->flash('emailError', $validator->errors()->first('email'));
            }
            if ($validator->errors()->has('pesan')) {
                session()->flash('pesanError', $validator->errors()->first('pesan'));
            }
            // Jika ada error, redirect kembali dengan input sebelumnya
            return Redirect::back()->withInput();
        }

        // Buat instance model Kontak dan isi dengan data dari form
        $kontak = new Kontak();
        $kontak->nama = $request->input('nama');
        $kontak->email = $request->input('email');
        $kontak->no_hp = $request->input('no_hp');
        $kontak->pesan = $request->input('pesan');

        // Simpan data ke database
        $kontak->save();

        // Berikan feedback sukses kepada pengguna
        return Redirect::route('kontak')->with('success', 'Pesan Anda berhasil dikirim!');
    }

    /**
     * Remove the specified contact message from storage.
     *
     * @param  \App\Models\Kontak  $contact // Menggunakan $contact sebagai parameter karena rute mungkin menggunakan nama ini
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kontak $contact) // Pastikan parameter sesuai dengan rute model binding
    {
        try {
            // Coba lakukan penghapusan
            $contact->delete(); // Atau $contact->forceDelete(); jika SoftDeletes aktif dan ingin dihapus permanen

            // Jika berhasil, redirect dengan pesan sukses
            return Redirect::route('admin.contacts.index')->with('success', 'Pesan kontak berhasil dihapus!');

        } catch (\Exception $e) {
            // Jika terjadi kesalahan, catat ke log Laravel
            Log::error('Gagal menghapus kontak (ID: ' . $contact->id . '): ' . $e->getMessage(), ['exception' => $e]);

            // Berikan feedback error ke pengguna
            return Redirect::back()->with('error', 'Gagal menghapus pesan. Silakan coba lagi.')->withInput();
        }
    }
}
