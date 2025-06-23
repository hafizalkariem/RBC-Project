<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'technologies', 'developer'])->get();
        $categories = Category::withCount('products')->get();
        $technologies = Technology::all();
        
        return view('admin.products.index', compact('products', 'categories', 'technologies'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'technologies', 'developer']);
        return view('admin.products.show', compact('product'));
    }
}