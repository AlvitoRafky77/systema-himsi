<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
        $table->foreignId('product_id')->constrained('produk')->onDelete('cascade'); // Relasi ke tabel produk
        $table->text('review'); // Kolom untuk review
        $table->integer('rating'); // Kolom untuk rating
        $table->timestamps();
        });
    }

    public function show($id)
    {
    $review = \App\Models\Review::with('user', 'product')->findOrFail($id); // Ambil review berdasarkan ID

    return view('review.show', compact('review')); // Kirim data review ke view
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
