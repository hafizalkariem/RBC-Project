@extends('layouts.app')

@section('title', 'Payment Pending')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-800 to-black pt-20 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-yellow-900/20 via-transparent to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 py-8 relative z-10">
        <div class="text-center">
            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-12 shadow-2xl max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse">
                    <i class="fas fa-clock text-white text-4xl"></i>
                </div>
                
                <h1 class="text-4xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent mb-4">
                    Payment Pending
                </h1>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    Your payment is being processed. Please wait for confirmation.<br>
                    You will receive an email once the payment is completed.
                </p>
                
                <!-- Order Details -->
                <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/30 border border-white/5 rounded-xl p-6 mb-8">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center justify-center">
                        <i class="fas fa-receipt mr-2 text-yellow-400"></i>
                        Order Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="text-center">
                            <p class="text-gray-400">Order ID</p>
                            <p class="text-white font-mono font-bold">{{ $order->payment_id }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-400">Total Amount</p>
                            <p class="text-2xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Status Info -->
                <div class="bg-gradient-to-r from-yellow-500/10 to-orange-500/10 border border-yellow-500/20 rounded-xl p-6 mb-8">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                        <p class="text-yellow-400 font-semibold">Processing Payment...</p>
                    </div>
                    <p class="text-gray-300 text-sm">
                        This usually takes a few minutes. Please don't close this page.
                    </p>
                </div>
                
                <!-- Action Buttons -->
                <div class="space-y-4">
                    <button onclick="location.reload()" 
                        class="group inline-flex items-center bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700 px-8 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-yellow-500/25">
                        <i class="fas fa-sync-alt mr-2 group-hover:rotate-180 transition-transform duration-300"></i>
                        Check Status
                    </button>
                    
                    <div class="flex justify-center space-x-4 mt-6">
                        <a href="{{ route('toko') }}" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-store mr-2"></i>
                            Back to Store
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
@endsection