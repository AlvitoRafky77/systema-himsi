<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ContactController; // Tambahkan import untuk ContactController
use App\Http\Controllers\ReviewController;
use App\Models\Produk;
use App\Models\Review;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    $products = \App\Models\Produk::all(); // Fetch all products
    $latest_reviews = Review::with('user', 'produk') // Eager load data user & produk terkait
                             ->latest()                 // Urutkan dari yang terbaru
                             ->take(3)                  // Ambil 3 review saja (atau jumlah lain)
                             ->get();
    return view('welcome', compact('products', 'latest_reviews')); // Pass products to the view
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Show login form
Route::post('/login', [AuthController::class, 'login']); // Process login form

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Show registration form
Route::post('/register', [AuthController::class, 'register']); // Process registration form

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Process logout

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $products = \App\Models\Produk::all(); // Fetch all products
        $latest_reviews = Review::with('user', 'produk')
                                 ->latest()
                                 ->take(3)
                                 ->get();
        // ===> DAN TAMBAHKAN 'latest_reviews' KE compact() <===
        return view('dashboard', compact('products', 'latest_reviews'));
    })->name('dashboard'); // Show dashboard
    Route::get('/about',[HomeController::class, 'about'])->name('about'); // Show about page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::get('/profile/update', [ProfileController::class, 'update'])->name('update');


    Route::get('/produk/merchandise', [ProdukController::class, 'merchandise'])->name('produk.merchandise');
    Route::get('/produk/makanan', [ProdukController::class, 'makanan'])->name('produk.makanan');
    Route::get('/produk/minuman', [ProdukController::class, 'minuman'])->name('produk.minuman');
    Route::get('/produk/detail', [ProdukController::class, 'showDetail'])->name('produk.detail');
    // Add route untuk menampilakan detail produk
    Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('review.show');

    Route::get('/kontak',[HomeController::class, 'kontak'])->name('kontak');
    Route::post('/kontak/kirim', [HomeController::class, 'storeKontak'])->name('kontak.store');
    // Search Route untuk mencari produk
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{produk}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

});

 // Show product detail
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin') // URL prefix for admin routes
    ->name('admin.')  // Route name prefix
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard'); // Render the admin dashboard view
        })->name('dashboard');

        Route::resource('products', ProductController::class); // Resource route for managing products

        // Route untuk menampilkan daftar pesan kontak
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    });


