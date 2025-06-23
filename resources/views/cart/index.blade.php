@extends('layouts.app')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-800 to-black pt-20 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-purple-900/20 via-transparent to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-6xl mx-auto px-4 py-8 relative z-10">
        <!-- Header -->
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-8 mb-8 shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Shopping Cart</h1>
                    <p class="text-gray-400 mt-1">Review your items before checkout</p>
                </div>
            </div>
        </div>

        @if($order && $order->orderItems->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white">Cart Items</h2>
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium">
                            {{ $order->orderItems->count() }} items
                        </span>
                    </div>

                    <div class="space-y-4">
                        @foreach($order->orderItems as $item)
                        <div class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-slate-800/50 to-slate-700/30 border border-white/5 p-4 hover:from-slate-700/60 hover:to-slate-600/40 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/10">
                            <!-- Subtle glow effect on hover -->
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="relative flex items-center space-x-4">
                                <div class="relative">
                                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                                        class="w-20 h-20 object-cover rounded-xl shadow-lg ring-2 ring-white/10 group-hover:ring-purple-500/30 transition-all duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <h3 class="text-white font-semibold text-lg group-hover:text-purple-100 transition-colors duration-200">
                                        {{ $item->product->name }}
                                    </h3>
                                    <p class="text-gray-400 text-sm mt-1 line-clamp-2">
                                        {{ Str::limit($item->product->description, 50) }}
                                    </p>
                                    <div class="flex items-center mt-2 space-x-2">
                                        <span class="px-2 py-1 bg-blue-500/20 text-blue-300 rounded-md text-xs font-medium">
                                            Qty: {{ $item->quantity }}
                                        </span>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <div class="text-2xl font-bold bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">
                                        ${{ number_format($item->price * $item->quantity, 0) }}
                                    </div>
                                    <div class="text-gray-400 text-sm mt-1">
                                        ${{ number_format($item->price , 0) }} each
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 sticky top-8 shadow-2xl">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center">
                        <i class="fas fa-receipt mr-3 text-purple-400"></i>
                        Order Summary
                    </h2>

                    <div class="space-y-6">
                        <!-- Items breakdown -->
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-gray-300">
                                <span class="flex items-center">
                                    <i class="fas fa-box mr-2 text-blue-400"></i>
                                    Subtotal ({{ $order->orderItems->sum('quantity') }} items)
                                </span>
                                <span class="font-semibold">${{ number_format($order->total_amount, 0) }}</span>
                            </div>

                            <div class="flex justify-between items-center text-gray-300">
                                <span class="flex items-center">
                                    <i class="fas fa-truck mr-2 text-green-400"></i>
                                    Shipping
                                </span>
                                <span class="text-green-400 font-medium">Free</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-700 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-white font-bold text-xl">Total</span>
                                <span class="text-3xl font-bold bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">
                                    ${{ number_format($order->total_amount, 0) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons -->
                    <div class="space-y-3 mt-8">
                        <button class="group relative w-full overflow-hidden bg-gradient-to-r from-purple-600 via-blue-600 to-purple-600 bg-size-200 bg-pos-0 hover:bg-pos-100 px-6 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-purple-500/25">
                            <span class="relative z-10 flex items-center justify-center">
                                <i class="fas fa-credit-card mr-2"></i>
                                Proceed to Checkout
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>

                        <a href="{{ route('toko') }}"
                            class="group block w-full text-center bg-slate-700/50 hover:bg-slate-600/60 border border-white/10 hover:border-white/20 px-6 py-3 rounded-xl text-white font-medium transition-all duration-300 hover:shadow-lg hover:shadow-slate-500/10">
                            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                            Continue Shopping
                        </a>
                    </div>

                    <!-- Security badge -->
                    <div class="mt-6 p-3 bg-green-500/10 border border-green-500/20 rounded-lg">
                        <div class="flex items-center text-green-400 text-sm">
                            <i class="fas fa-shield-alt mr-2"></i>
                            <span>Secure checkout guaranteed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Empty cart state -->
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-16 text-center shadow-2xl">
            <div class="relative">
                <!-- Animated cart icon -->
                <div class="inline-block relative">
                    <i class="fas fa-shopping-cart text-8xl text-gray-600 mb-8 animate-pulse"></i>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs font-bold">0</span>
                    </div>
                </div>

                <h2 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent mb-4">
                    Your cart is empty
                </h2>
                <p class="text-gray-400 mb-12 text-lg max-w-md mx-auto">
                    Discover amazing products and start building your perfect collection
                </p>

                <a href="{{ route('toko') }}"
                    class="group inline-flex items-center bg-gradient-to-r from-purple-600 via-blue-600 to-purple-600 bg-size-200 bg-pos-0 hover:bg-pos-100 px-10 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25">
                    <i class="fas fa-shopping-bag mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                    Start Shopping
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-200"></i>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .bg-size-200 {
        background-size: 200% 200%;
    }

    .bg-pos-0 {
        background-position: 0% 50%;
    }

    .bg-pos-100 {
        background-position: 100% 50%;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection