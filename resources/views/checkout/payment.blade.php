@extends('layouts.app')

@section('title', 'Pembayaran')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
@endsection

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-800 to-black pt-20 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-purple-900/20 via-transparent to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 py-8 relative z-10">
        <!-- Header -->
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-8 mb-8 shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-credit-card text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Secure Payment</h1>
                    <p class="text-gray-400 mt-1">Complete your purchase safely</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Order Summary -->
            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 shadow-2xl">
                <h2 class="text-xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-receipt mr-3 text-purple-400"></i>
                    Order Summary
                </h2>
                
                <div class="space-y-4 mb-6">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-slate-800/50 to-slate-700/30 border border-white/5 rounded-xl">
                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                            class="w-16 h-16 object-cover rounded-lg shadow-lg ring-2 ring-white/10">
                        <div class="flex-1">
                            <h3 class="text-white font-semibold">{{ $item->product->name }}</h3>
                            <p class="text-gray-400 text-sm">Quantity: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">
                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </div>
                            <div class="text-gray-400 text-sm">
                                Rp {{ number_format($item->price, 0, ',', '.') }} each
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="border-t border-gray-700 pt-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300">Subtotal</span>
                        <span class="text-white font-semibold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-300">Shipping</span>
                        <span class="text-green-400 font-medium">Free</span>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-700">
                        <span class="text-white font-bold text-xl">Total</span>
                        <span class="text-3xl font-bold bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">
                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 shadow-2xl">
                <h2 class="text-xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-shield-alt mr-3 text-green-400"></i>
                    Payment Method
                </h2>
                
                <div class="space-y-6">
                    <!-- Payment Options Info -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-r from-blue-500/10 to-blue-600/10 border border-blue-500/20 rounded-xl p-4 text-center">
                            <i class="fas fa-credit-card text-blue-400 text-2xl mb-2"></i>
                            <p class="text-white text-sm font-medium">Credit Card</p>
                        </div>
                        <div class="bg-gradient-to-r from-green-500/10 to-green-600/10 border border-green-500/20 rounded-xl p-4 text-center">
                            <i class="fas fa-university text-green-400 text-2xl mb-2"></i>
                            <p class="text-white text-sm font-medium">Bank Transfer</p>
                        </div>
                        <div class="bg-gradient-to-r from-purple-500/10 to-purple-600/10 border border-purple-500/20 rounded-xl p-4 text-center">
                            <i class="fas fa-wallet text-purple-400 text-2xl mb-2"></i>
                            <p class="text-white text-sm font-medium">E-Wallet</p>
                        </div>
                        <div class="bg-gradient-to-r from-orange-500/10 to-orange-600/10 border border-orange-500/20 rounded-xl p-4 text-center">
                            <i class="fas fa-qrcode text-orange-400 text-2xl mb-2"></i>
                            <p class="text-white text-sm font-medium">QRIS</p>
                        </div>
                    </div>
                    
                    <!-- Payment Button -->
                    <button id="pay-button" class="group relative w-full overflow-hidden bg-gradient-to-r from-green-600 via-emerald-600 to-green-600 px-6 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-green-500/25">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fas fa-lock mr-2"></i>
                            Pay Securely Now
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-green-600/20 to-emerald-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    
                    <!-- Security Info -->
                    <div class="bg-gradient-to-r from-gray-800/50 to-gray-700/30 border border-white/5 rounded-xl p-4">
                        <div class="flex items-center justify-center space-x-6 text-gray-400 text-sm">
                            <div class="flex items-center">
                                <i class="fas fa-shield-alt mr-2 text-green-400"></i>
                                SSL Encrypted
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-lock mr-2 text-blue-400"></i>
                                Secure Payment
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2 text-purple-400"></i>
                                Verified
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
document.getElementById('pay-button').onclick = function(){
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            window.location.href = '{{ route("checkout.success") }}?order_id={{ $order->payment_id }}';
        },
        onPending: function(result){
            window.location.href = '{{ route("checkout.pending") }}?order_id={{ $order->payment_id }}';
        },
        onError: function(result){
            window.location.href = '{{ route("checkout.error") }}?order_id={{ $order->payment_id }}';
        }
    });
};
</script>
@endsection