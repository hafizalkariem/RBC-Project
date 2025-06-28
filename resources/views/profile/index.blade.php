@extends('layouts.app')

@section('title', 'Profile')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-8 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Pending Payment Alert -->
        @if($pendingPayment)
        <div class="mb-6 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 border border-yellow-500/30 rounded-xl p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Pembayaran Menunggu</h3>
                        <p class="text-gray-300 text-sm">Order #{{ $pendingPayment->id }} - Rp {{ number_format($pendingPayment->total_amount, 0) }}</p>
                        @if(isset($pendingPayment->expiry_time_formatted))
                        <p class="text-gray-400 text-xs">Berakhir: {{ \Carbon\Carbon::parse($pendingPayment->expiry_time_formatted)->format('d M Y, H:i') }} WIB</p>
                        @endif
                        @if(isset($pendingPayment->expiry_timestamp))
                        <p class="countdown-text text-yellow-400 text-sm" data-expiry="{{ $pendingPayment->expiry_timestamp }}">Sisa waktu: Loading...</p>
                        @endif
                    </div>
                </div>
                <button onclick="continuePayment('{{ $pendingPayment->snap_token }}')"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    Lanjutkan Pembayaran
                </button>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Profile Info -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                            @if($user->image)
                            <img src="{{ Storage::url($user->image) }}" alt="Profile" class="w-24 h-24 rounded-full object-cover">
                            @else
                            <span class="text-white text-2xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <h2 class="text-xl font-bold text-white mb-1">{{ $user->name }}</h2>
                        <p class="text-gray-400 mb-4">{{ $user->email }}</p>

                        <div class="space-y-2 text-sm text-gray-300">
                            @if($user->phone_number)
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-phone text-gray-400"></i>
                                <span>{{ $user->phone_number }}</span>
                            </div>
                            @endif
                            @if($user->address)
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                                <span>{{ $user->address }}</span>
                            </div>
                            @endif
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-calendar text-gray-400"></i>
                                <span>Bergabung {{ $user->created_at->format('M Y') }}</span>
                            </div>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                            class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats & Transactions -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-gradient-to-r from-blue-500/20 to-blue-600/20 border border-blue-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-400">{{ $stats['total_orders'] }}</div>
                            <div class="text-sm text-gray-300">Total Order</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-green-500/20 to-green-600/20 border border-green-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-400">{{ $stats['completed_orders'] }}</div>
                            <div class="text-sm text-gray-300">Selesai</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-yellow-500/20 to-yellow-600/20 border border-yellow-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-yellow-400">{{ $stats['pending_orders'] }}</div>
                            <div class="text-sm text-gray-300">Pending</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-red-500/20 to-red-600/20 border border-red-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-red-400">{{ $stats['failed_orders'] }}</div>
                            <div class="text-sm text-gray-300">Gagal</div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gradient-to-r from-purple-500/20 to-purple-600/20 border border-purple-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-xl font-bold text-purple-400">Rp {{ number_format($stats['total_spent'], 0) }}</div>
                            <div class="text-sm text-gray-300">Total Belanja</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Transaksi Terbaru</h3>
                        <a href="{{ route('profile.transactions') }}" class="text-blue-400 hover:text-blue-300 text-sm">
                            Lihat Semua
                        </a>
                    </div>

                    @forelse($recentTransactions as $transaction)
                    <div class="flex items-center justify-between py-4 border-b border-gray-700/50 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                                <i class="fas fa-shopping-bag text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-medium">Order #{{ $transaction->id }}</div>
                                <div class="text-gray-400 text-sm">
                                    @if($transaction->orderItems->count() == 1)
                                        {{ $transaction->orderItems->first()->product->name ?? 'Product Deleted' }}
                                    @else
                                        {{ $transaction->orderItems->first()->product->name ?? 'Product Deleted' }} +{{ $transaction->orderItems->count() - 1 }} lainnya
                                    @endif
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $transaction->created_at->format('d M Y') }}
                                    @if($transaction->payment_method)
                                        • {{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-white font-semibold">Rp {{ number_format($transaction->total_amount, 0) }}</div>
                            <div class="text-xs">
                                @if($transaction->status === 'completed')
                                <span class="text-green-400">Selesai</span>
                                @elseif($transaction->status === 'pending')
                                <span class="text-yellow-400">Pending</span>
                                @elseif($transaction->status === 'failed')
                                <span class="text-red-400">Gagal</span>
                                @else
                                <span class="text-gray-400">{{ ucfirst($transaction->status) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-gray-400">
                        <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                        <p>Belum ada transaksi</p>
                        <a href="{{ route('toko') }}" class="text-blue-400 hover:text-blue-300 text-sm">
                            Mulai Belanja
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@if($pendingPayment)
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    function continuePayment(snapToken) {
        snap.pay(snapToken, {
            onSuccess: function(result) {
                window.location.href = '/checkout/success?order_id=' + result.order_id;
            },
            onPending: function(result) {
                window.location.href = '/checkout/pending?order_id=' + result.order_id;
            },
            onError: function(result) {
                window.location.href = '/checkout/error?order_id=' + result.order_id;
            }
        });
    }
    
    // Real-time countdown timer
    @if(isset($pendingPayment->expiry_timestamp))
    const expiryTimestamp = {{ $pendingPayment->expiry_timestamp }} * 1000; // Convert to milliseconds
    const orderId = '{{ $pendingPayment->payment_id }}';
    const countdownElement = document.querySelector('.countdown-text');
    
    function updateCountdown() {
        // Get current time in Jakarta timezone
        const now = new Date().getTime();
        const timeLeft = expiryTimestamp - now;
        
        if (timeLeft <= 0) {
            countdownElement.textContent = 'Sisa waktu: Expired';
            countdownElement.className = 'countdown-text text-red-400 text-sm font-semibold';
            // Auto-reload when expired
            setTimeout(() => location.reload(), 2000);
            return;
        }
        
        const hours = Math.floor(timeLeft / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        
        let timeText = '';
        let colorClass = 'text-yellow-400';
        
        if (hours > 0) {
            timeText = `${hours}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        } else {
            timeText = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            // Change color when less than 5 minutes
            if (minutes < 5) {
                colorClass = 'text-red-400';
            } else if (minutes < 10) {
                colorClass = 'text-orange-400';
            }
        }
        
        countdownElement.textContent = `Sisa waktu: ${timeText}`;
        countdownElement.className = `countdown-text ${colorClass} text-sm font-medium`;
    }
    
    function checkPaymentStatus() {
        fetch(`/api/payment-status/${orderId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'completed' || data.status === 'cancelled') {
                    location.reload();
                } else if (data.payment_status === 'expire') {
                    location.reload();
                }
            })
            .catch(error => console.log('Status check failed:', error));
    }
    
    // Update countdown every second
    const countdownInterval = setInterval(updateCountdown, 1000);
    
    // Check payment status every 15 seconds
    const statusInterval = setInterval(checkPaymentStatus, 15000);
    
    // Initial countdown update
    updateCountdown();
    
    // Cleanup intervals when page unloads
    window.addEventListener('beforeunload', function() {
        clearInterval(countdownInterval);
        clearInterval(statusInterval);
    });
    @endif
</script>
@endif
@endsection