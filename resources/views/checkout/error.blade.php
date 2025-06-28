@extends('layouts.app')

@section('title', 'Payment Failed')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-800 to-black pt-20 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-red-900/20 via-transparent to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-pink-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 py-8 relative z-10">
        <div class="text-center">
            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-12 shadow-2xl max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-gradient-to-r from-red-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-times text-white text-4xl"></i>
                </div>
                
                <h1 class="text-4xl font-bold bg-gradient-to-r from-red-400 to-pink-500 bg-clip-text text-transparent mb-4">
                    Payment Failed
                </h1>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    Sorry, we couldn't process your payment. Please try again<br>
                    or contact our support team for assistance.
                </p>
                
                <!-- Order Details -->
                <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/30 border border-white/5 rounded-xl p-6 mb-8">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center justify-center">
                        <i class="fas fa-receipt mr-2 text-red-400"></i>
                        Order Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="text-center">
                            <p class="text-gray-400">Order ID</p>
                            <p class="text-white font-mono font-bold">{{ $order->payment_id }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-400">Total Amount</p>
                            <p class="text-2xl font-bold bg-gradient-to-r from-red-400 to-pink-500 bg-clip-text text-transparent">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Error Info -->
                <div class="bg-gradient-to-r from-red-500/10 to-pink-500/10 border border-red-500/20 rounded-xl p-6 mb-8">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
                        <p class="text-red-400 font-semibold">Payment Processing Failed</p>
                    </div>
                    <div class="text-gray-300 text-sm space-y-2">
                        <p>• Check your payment method details</p>
                        <p>• Ensure sufficient balance/credit limit</p>
                        <p>• Try a different payment method</p>
                        <p>• Contact your bank if the issue persists</p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="space-y-4">
                    <a href="{{ route('checkout.process') }}" 
                        class="group inline-flex items-center bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 px-8 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25">
                        <i class="fas fa-redo mr-2 group-hover:rotate-180 transition-transform duration-300"></i>
                        Try Again
                    </a>
                    
                    <div class="flex justify-center space-x-4 mt-6">
                        <a href="{{ route('toko') }}" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-store mr-2"></i>
                            Back to Store
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-headset mr-2"></i>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection