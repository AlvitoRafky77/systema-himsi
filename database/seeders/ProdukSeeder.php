<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan atau perbarui data untuk Merchandise
        DB::table('produk')->updateOrInsert(
            ['name' => 'Lanyard HIMSI'], // Kondisi unik
            [
                'type' => 'merchandise',
                'price' => 14000,
                'image' => 'Mockup Lanyard.jpg',
                'stock' => 100,
                'description' => 'Lanyard HIMSI bergaya elegan dengan warna identitas jurusan, logo HIMSI tercetak jelas, dan bahan kualitas premium.',
                'updated_at' => now(),
            ]
        );

        DB::table('produk')->updateOrInsert(
            ['name' => 'Keychain HIMSI'], // Kondisi unik
            [
                'type' => 'merchandise',
                'price' => 10000,
                'image' => 'Keychain.png',
                'stock' => 50,
                'description' => 'Keychain HIMSI stylish dan fungsional, jadi simbol kebanggaan anak Sistem Informasi.',
                'updated_at' => now(),
            ]
        );

        // Tambahkan atau perbarui data untuk Makanan
        DB::table('produk')->updateOrInsert(
            ['name' => 'Ayam Suwir Pedas'], // Kondisi unik
            [
                'type' => 'food',
                'price' => 15000,
                'image' => 'Ayam Suwir.jpg',
                'stock' => 30,
                'description' => 'Nikmati kelezatan Ayam Suwir dengan cita rasa autentik yang kaya rempah. Siap santap, higienis, dan terjamin kualitasnya.',
                'updated_at' => now(),
            ]
        );

        DB::table('produk')->updateOrInsert(
            ['name' => 'Ayam Katsu Komplit'], // Kondisi unik
            [
                'type' => 'food',
                'price' => 15000,
                'image' => 'chicken-katsu.jpeg',
                'stock' => 20,
                'description' => 'Crispy di luar, juicy di dalam! Ayam Katsu siap jadi pilihan favorit kamu—dengan balutan tepung renyah.',
                'updated_at' => now(),
            ]
        );

        // Tambahkan atau perbarui data untuk Minuman
        DB::table('produk')->updateOrInsert(
            ['name' => 'Pop Ice Aneka Rasa'], // Kondisi unik
            [
                'type' => 'drink',
                'price' => 7000,
                'image' => 'Pop Ice.jpg',
                'stock' => 50,
                'description' => 'Rasakan nikmatnya air minum menyegarkan dan menghilangkan dahaga, cocok saat panas-panas gini!',
                'updated_at' => now(),
            ]
        );

        DB::table('produk')->updateOrInsert(
            ['name' => 'Sticker HIMSI'], // Kondisi unik
            [
                'type' => 'merchandise',
                'price' => 5000,
                'image' => 'Sticker.png',
                'stock' => 100,
                'description' => 'Stiker HIMSI dengan tampilan yang kece dan menandakan kamu bergabung ke keluarga HIMSI',
                'updated_at' => now(),
            ]
        );
    }
}
