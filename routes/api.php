<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);

// Shop Routes
Route::get('/products', [App\Http\Controllers\Shop\ProductController::class, 'index']);
Route::get('/products/{id}', [App\Http\Controllers\Shop\ProductController::class, 'show']);
Route::post('/cart', [App\Http\Controllers\Shop\CartController::class, 'add']);

// Blog Routes
Route::get('/blogs', [App\Http\Controllers\Blog\BlogController::class, 'index']);
Route::get('/blogs/{id}', [App\Http\Controllers\Blog\BlogController::class, 'show']);

// Portfolio Routes
Route::get('/portfolios', [App\Http\Controllers\Portfolio\PortfolioController::class, 'index']);
Route::get('/portfolios/{id}', [App\Http\Controllers\Portfolio\PortfolioController::class, 'show']);

// Contact Routes
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit']);