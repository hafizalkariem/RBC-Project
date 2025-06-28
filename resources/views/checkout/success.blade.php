@extends('layouts.app')

@section('title', 'Payment Successful')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-800 to-black pt-20 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-green-900/20 via-transparent to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 py-8 relative z-10">
        <div class="text-center">
            <!-- Success Animation -->
            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-12 shadow-2xl max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse">
                    <i class="fas fa-check text-white text-4xl"></i>
                </div>
                
                <h1 class="text-4xl font-bold bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent mb-4">
                    Payment Successful!
                </h1>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    Thank you for your purchase! Your order has been processed successfully.<br>
                    You can now download your source code files.
                </p>
                
                <!-- Order Details -->
                <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/30 border border-white/5 rounded-xl p-6 mb-8">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center justify-center">
                        <i class="fas fa-receipt mr-2 text-green-400"></i>
                        Order Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="text-center">
                            <p class="text-gray-400">Order ID</p>
                            <p class="text-white font-mono font-bold">{{ $order->payment_id }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-400">Total Amount</p>
                            <p class="text-2xl font-bold bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Purchased Items -->
                <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/30 border border-white/5 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center justify-center">
                        <i class="fas fa-download mr-2 text-blue-400"></i>
                        Your Downloads
                    </h3>
                    <div class="space-y-3">
                        @foreach($order->orderItems as $item)
                        <div class="flex items-center justify-between p-3 bg-white/5 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                                    class="w-12 h-12 object-cover rounded-lg">
                                <div class="text-left">
                                    <p class="text-white font-semibold">{{ $item->product->name }}</p>
                                    <p class="text-gray-400 text-sm">{{ $item->product->category->name ?? 'Source Code' }}</p>
                                </div>
                            </div>
                            @if($item->product && $item->product->hasSourceCode())
                            <a href="{{ route('download.product', $item->product) }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-4 py-2 rounded-lg text-white font-medium transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-download mr-2"></i>
                                Download
                            </a>
                            @else
                            <span class="bg-gray-600 px-4 py-2 rounded-lg text-gray-300 font-medium">
                                <i class="fas fa-times mr-2"></i>
                                No Source Code
                            </span>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Download All Button -->
                    @if($order->orderItems->filter(fn($item) => $item->product && $item->product->hasSourceCode())->count() > 1)
                    <div class="mt-4 pt-4 border-t border-gray-700">
                        <a href="{{ route('download.order', $order) }}" id="downloadAllBtn" class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 px-6 py-3 rounded-lg text-white font-bold transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-download mr-2"></i>
                            Download All Source Codes
                        </a>
                    </div>
                    @endif
                </div>
                
                <!-- Action Buttons -->
                <div class="space-y-4">
                    <a href="{{ route('toko') }}" 
                        class="group inline-flex items-center bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 px-8 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25">
                        <i class="fas fa-store mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                        Continue Shopping
                    </a>
                    
                    <div class="flex justify-center space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-history mr-2"></i>
                            View Order History
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-headset mr-2"></i>
                            Need Help?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto download source codes after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
    const downloadLinks = document.querySelectorAll('a[href*="download/product"]');
    const downloadAllBtn = document.getElementById('downloadAllBtn');
    
    if (downloadAllBtn) {
        // If there's a download all button, use it instead of individual downloads
        setTimeout(() => {
            downloadAllBtn.click();
        }, 3000);
    } else if (downloadLinks.length === 1) {
        // If only one product, download directly
        setTimeout(() => {
            downloadLinks[0].click();
        }, 3000);
    }
});
</script>
@endsection