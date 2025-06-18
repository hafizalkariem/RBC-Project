<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

// Home Page
Route::get('/', [PageController::class, 'home'])->name('home');

// About Page
Route::get('/about', [PageController::class, 'about'])->name('about');

// Contact Page
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Shop Routes
Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/product/{product}', [ShopController::class, 'show'])->name('shop.show');
    Route::post('/cart/add/{product}', [ShopController::class, 'addToCart'])->name('shop.cart.add');
    Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
    Route::post('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
});

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Portfolio Routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{item}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Admin Routes (Protected by middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Additional admin routes can be added here
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/services', function () {
    return view('pages.services');
})->name('services.index');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
