<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\TechCategory;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:technologies,name',
                'description' => 'nullable|string',
                'tech_category_id' => 'required|exists:tech_categories,id',
                'logo_url' => 'nullable|url',
                'expertise_level' => 'nullable|integer|min:1|max:5'
            ]);

            $technology = Technology::create([
                'name' => $request->name,
                'description' => $request->description,
                'tech_category_id' => $request->tech_category_id,
                'logo_url' => $request->logo_url,
                'expertise_level' => $request->expertise_level ?: 3,
                'order' => Technology::max('order') + 1
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Teknologi berhasil ditambahkan!',
                'technology' => $technology->load('category')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function stats(Technology $technology)
    {
        $technology->load(['products.category', 'category']);
        
        $categories = $technology->products->groupBy('category.name')->map(function ($products, $categoryName) {
            return [
                'name' => $categoryName,
                'products_count' => $products->count()
            ];
        })->values();
        
        return response()->json([
            'technology' => $technology,
            'usage_count' => $technology->products->count(),
            'categories' => $categories,
            'products' => $technology->products
        ]);
    }

    public function destroy(Request $request, Technology $technology)
    {
        try {
            // Detach from products
            $technology->products()->detach();
            
            // Delete technology
            $technology->delete();

            return response()->json([
                'success' => true,
                'message' => 'Teknologi berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}