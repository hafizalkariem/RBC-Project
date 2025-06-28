<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        // Get or create pending order for user (only orders without payment_id)
        $order = Order::where('user_id', Auth::id())
                     ->where('status', 'pending')
                     ->whereNull('payment_id')
                     ->first();
                     
        if (!$order) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'total_amount' => 0,
                'payment_method' => null
            ]);
        }

        // Check if product already in cart
        $orderItem = OrderItem::where('order_id', $order->id)
                             ->where('product_id', $product->id)
                             ->first();

        if ($orderItem) {
            $orderItem->increment('quantity');
        } else {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => 1
            ]);
        }

        // Update total amount
        $order->total_amount = $order->orderItems()->sum(DB::raw('price * quantity'));
        $order->save();

        return response()->json([
            'success' => true,
            'cart_count' => $order->orderItems()->sum('quantity')
        ]);
    }

    public function getCartCount()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }

        $order = Order::where('user_id', Auth::id())
                     ->where('status', 'pending')
                     ->whereNull('payment_id')
                     ->first();

        $count = $order ? $order->orderItems()->sum('quantity') : 0;

        return response()->json(['count' => $count]);
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $order = Order::with(['orderItems.product'])
                     ->where('user_id', Auth::id())
                     ->where('status', 'pending')
                     ->whereNull('payment_id')
                     ->first();

        return view('cart.index', compact('order'));
    }

    public function removeFromCart(OrderItem $orderItem)
    {
        if (!Auth::check() || $orderItem->order->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $order = $orderItem->order;
        $orderItem->delete();

        // Update total amount
        $order->total_amount = $order->orderItems()->sum(DB::raw('price * quantity'));
        $order->save();

        return response()->json([
            'success' => true,
            'cart_count' => $order->orderItems()->sum('quantity')
        ]);
    }
}