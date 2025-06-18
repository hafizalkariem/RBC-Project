<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display shop homepage with filtered products
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Apply filters
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('technology')) {
            $query->where('technology', $request->technology);
        }

        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // Apply sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'bestseller':
                $query->orderBy('sales_count', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12);

        return view('pages.shop.index', compact('products'));
    }

    /**
     * Display product details
     */
    public function show(Product $product)
    {
        return view('pages.shop.show', compact('product'));
    }

    /**
     * Add product to cart
     */
    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Show shopping cart
     */
    public function cart()
    {
        return view('pages.shop.cart');
    }

    /**
     * Process checkout
     */
    public function checkout(Request $request)
    {
        // Validate checkout data
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'payment_method' => 'required'
        ]);

        // Process payment and create order
        // ... payment gateway integration code here

        return redirect()->route('shop.confirmation');
    }
}
