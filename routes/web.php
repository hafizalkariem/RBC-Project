<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

// Home Page
Route::get('/', [PageController::class, 'home'])->name('home');

// Toko Page
Route::get('/toko', [PageController::class, 'toko'])->name('toko');

// About Page
Route::get('/about', [PageController::class, 'about'])->name('about');

// Service Page
Route::get('/service', [PageController::class, 'service'])->name('service');

// portfolio Page
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portofolio', [PageController::class, 'portfolio'])->name('portofolio');
// blog Page
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
// about Page
Route::get('/about', [PageController::class, 'about'])->name('about');
// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/services', function () {
    return view('pages.services');
})->name('services.index');
