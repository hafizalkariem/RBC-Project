<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TokoController;

// Home Page
Route::get('/', [PageController::class, 'home'])->name('home');

// Toko Page
Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/toko/search', [TokoController::class, 'search'])->name('toko.search');

// Cart routes
Route::middleware('auth')->group(function () {
    Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/count', [App\Http\Controllers\CartController::class, 'getCartCount'])->name('cart.count');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
});

// About Page
Route::get('/about', [PageController::class, 'about'])->name('about');

// Service Page
Route::get('/service', [PageController::class, 'service'])->name('service');

// portfolio Page
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portofolio', [PageController::class, 'portfolio'])->name('portofolio');
// blog Page
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/services', function () {
    return view('pages.services');
})->name('services.index');

// Developer routes
Route::get('/developer/{id}', [App\Http\Controllers\DeveloperController::class, 'show'])->name('developer.profile');

// Profile routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes (protected)
Route::middleware(['auth', App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.products.show');
});
