<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Technology;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all() ?? collect();
        $technologies = Technology::all() ?? collect();

        $products = Product::with(['category', 'technologies', 'developer'])
            ->when($request->category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                           ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->when($request->technology, function ($query, $technology) {
                return $query->whereHas('technologies', function ($q) use ($technology) {
                    $q->where('name', $technology);
                });
            })
            ->paginate(6);

        return view('pages.toko', compact('products', 'categories', 'technologies'));
    }

    public function search(Request $request)
    {
        try {
            $products = Product::with(['category', 'technologies', 'developer'])
                ->when($request->category, function ($query, $category) {
                    return $query->where('category_id', $category);
                })
                ->when($request->search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%')
                               ->orWhere('description', 'like', '%' . $search . '%');
                })
                ->when($request->technology, function ($query, $technology) {
                    return $query->whereHas('technologies', function ($q) use ($technology) {
                        $q->where('name', $technology);
                    });
                })
                ->get();

            $html = '';
            if ($products->count() > 0) {
                foreach ($products as $index => $product) {
                    $html .= view('components.toko.product-card', compact('product', 'index'))->render();
                }
            } else {
                $html = view('components.toko.empty-state')->render();
            }

            return response()->json([
                'html' => $html,
                'count' => $products->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'html' => '<div class="col-span-full text-center py-12"><div class="glass-card rounded-3xl p-8 text-white"><h3 class="text-xl font-bold mb-2">Error</h3><p class="text-white/70">Terjadi kesalahan saat mencari produk</p></div></div>'
            ]);
        }
    }
}
