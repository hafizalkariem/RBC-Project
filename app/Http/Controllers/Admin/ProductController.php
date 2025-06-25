<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Technology;
use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'technologies', 'developer']);
        
        // Apply filters
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $products = $query->paginate(10)->withQueryString();
        $allProducts = Product::with(['category', 'technologies', 'developer'])->get();
        $categories = Category::withCount('products')->get();
        $technologies = Technology::all();
        
        // Calculate real statistics
        $stats = [
            'total_sales' => $allProducts->sum(function($product) {
                return $product->orderItems->sum('quantity');
            }),
            'total_revenue' => $allProducts->sum(function($product) {
                return $product->orderItems->sum(function($item) {
                    return $item->quantity * $item->price;
                });
            }),
            'avg_price' => $allProducts->count() > 0 ? $allProducts->avg('price') : 0,
            'products_with_source' => $allProducts->filter(function($product) {
                return $product->hasSourceCode();
            })->count(),
            'recent_products' => $allProducts->sortByDesc('created_at')->take(5)
        ];

        return view('admin.products.index', compact('products', 'allProducts', 'categories', 'technologies', 'stats'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'technologies', 'developer', 'orderItems']);
        return view('admin.products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        $developers = Developer::all();
        $techCategories = \App\Models\TechCategory::all();

        return response()->json([
            'categories' => $categories,
            'technologies' => $technologies,
            'developers' => $developers,
            'techCategories' => $techCategories
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
                'developer_id' => 'required|exists:developers,id',
                'status' => 'nullable|in:hot,premium,best,new',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'source_code' => 'required|file|mimes:zip,rar|max:51200',
                'preview_url' => 'nullable|url',
                'technologies' => 'array',
                'technologies.*' => 'exists:technologies,id'
            ]);

            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->developer_id = $request->developer_id;
            $product->status = $request->status;
            $product->preview_url = $request->preview_url;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $product->image_url = $imagePath;
            }

            $detectedTechIds = [];
            if ($request->hasFile('source_code')) {
                $sourceCodePath = $request->file('source_code')->store('source-codes', 'public');
                $product->source_code_path = $sourceCodePath;
                
                // Auto-detect technologies with smart scoring
                $detector = new \App\Services\SmartLanguageDetector();
                $fullPath = storage_path('app/public/' . $sourceCodePath);
                $detectedTechIds = $detector->detectFromZip($fullPath);
            }

            $product->save();

            // Merge manual selection with auto-detected
            $techIds = array_unique(array_merge(
                $request->get('technologies', []),
                $detectedTechIds
            ));
            
            if (!empty($techIds)) {
                $product->technologies()->attach($techIds);
            }

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan!',
                'detected_technologies' => $detectedTechIds,
                'product' => $product->load(['category', 'technologies', 'developer'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        $developers = Developer::all();

        return response()->json([
            'product' => $product->load(['category', 'technologies', 'developer']),
            'categories' => $categories,
            'technologies' => $technologies,
            'developers' => $developers
        ]);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
                'developer_id' => 'required|exists:developers,id',
                'status' => 'nullable|in:hot,premium,best,new',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'source_code' => 'nullable|file|mimes:zip,rar|max:51200',
                'preview_url' => 'nullable|url',
                'technologies' => 'array',
                'technologies.*' => 'exists:technologies,id'
            ]);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->developer_id = $request->developer_id;
            $product->status = $request->status;
            $product->preview_url = $request->preview_url;

            if ($request->hasFile('image')) {
                if ($product->image_url && !filter_var($product->image_url, FILTER_VALIDATE_URL)) {
                    Storage::disk('public')->delete($product->image_url);
                }
                $imagePath = $request->file('image')->store('products', 'public');
                $product->image_url = $imagePath;
            }

            if ($request->hasFile('source_code')) {
                if ($product->source_code_path) {
                    Storage::disk('public')->delete($product->source_code_path);
                }
                $sourceCodePath = $request->file('source_code')->store('source-codes', 'public');
                $product->source_code_path = $sourceCodePath;
            }

            $product->save();

            if ($request->has('technologies')) {
                $product->technologies()->sync($request->technologies);
            }

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil diupdate!',
                'product' => $product->load(['category', 'technologies', 'developer'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $query = Product::with(['category', 'technologies', 'developer']);
        
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $products = $query->paginate(10)->withQueryString();
        
        return response()->json([
            'html' => view('components.admin.products.products-table', compact('products'))->render(),
            'pagination' => view('components.admin.products.pagination', compact('products'))->render()
        ]);
    }

    public function detectTechnologies(Request $request)
    {
        $request->validate([
            'source_code' => 'required|file|mimes:zip,rar|max:51200'
        ]);

        try {
            $tempPath = $request->file('source_code')->store('temp', 'public');
            $fullPath = storage_path('app/public/' . $tempPath);
            
            $detector = new \App\Services\SmartLanguageDetector();
            $detectedTechIds = $detector->detectFromZip($fullPath);
            
            Storage::disk('public')->delete($tempPath);
            
            $technologies = Technology::whereIn('id', $detectedTechIds)->get();
            
            return response()->json([
                'success' => true,
                'technologies' => $technologies
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendeteksi teknologi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, Product $product)
    {
        try {
            // Delete image file if exists and not external URL
            if ($product->image_url && !filter_var($product->image_url, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($product->image_url);
            }

            // Delete source code file if exists
            if ($product->source_code_path) {
                Storage::disk('public')->delete($product->source_code_path);
            }

            // Detach technologies
            $product->technologies()->detach();

            // Delete product
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
