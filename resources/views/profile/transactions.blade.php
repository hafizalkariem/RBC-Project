@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-8 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-4">
                <a href="{{ route('profile') }}" class="text-gray-400 hover:text-white">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-3xl font-bold text-white">Riwayat Transaksi</h1>
            </div>
        </div>

        <!-- Transactions -->
        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl overflow-hidden">
            @forelse($transactions as $transaction)
            <div class="p-6 border-b border-gray-700/50 last:border-b-0">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            <h3 class="text-lg font-semibold text-white">Order #{{ $transaction->id }}</h3>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($transaction->status === 'completed') bg-green-500/20 text-green-400
                                @elseif($transaction->status === 'pending') bg-yellow-500/20 text-yellow-400
                                @else bg-gray-500/20 text-gray-400 @endif">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </div>
                        @if($transaction->orderItems->count() > 0)
                        <div class="text-gray-300 text-sm mb-2">
                            <strong>Produk:</strong>
                            @if($transaction->orderItems->count() == 1)
                            {{ $transaction->orderItems->first()->product->name ?? 'Product Deleted' }}
                            @else
                            {{ $transaction->orderItems->first()->product->name ?? 'Product Deleted' }} dan {{ $transaction->orderItems->count() - 1 }} produk lainnya
                            @endif
                        </div>
                        @endif
                        <div class="text-gray-400 text-sm space-y-1">
                            <div>{{ $transaction->created_at->format('d M Y, H:i') }}</div>
                            @if($transaction->payment_method)
                            <div>{{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}</div>
                            @endif
                            @if($transaction->paid_at)
                            <div>Dibayar: {{ $transaction->paid_at->format('d M Y, H:i') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-xl font-bold text-white">Rp {{ number_format($transaction->total_amount, 0) }}</div>
                        <div class="text-gray-400 text-sm">{{ $transaction->orderItems->count() }} item(s)</div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="space-y-3">
                    @foreach($transaction->orderItems as $item)
                    <div class="flex items-center space-x-4 bg-gray-700/30 rounded-lg p-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            @if($item->product && $item->product->image_url)
                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-16 h-16 rounded-lg object-cover">
                            @else
                            <i class="fas fa-box text-white text-xl"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="text-white font-medium">{{ $item->product->name ?? 'Product Deleted' }}</div>
                            <div class="text-gray-400 text-sm">
                                Qty: {{ $item->quantity }} × Rp {{ number_format($item->price, 0) }}
                            </div>
                        </div>
                        <div class="text-white font-semibold">
                            Rp {{ number_format($item->price * $item->quantity, 0) }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Actions -->
                @if($transaction->status === 'completed')
                <div class="mt-4 flex space-x-3">
                    <a href="{{ route('download.order', $transaction) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <i class="fas fa-download mr-2"></i>Download
                    </a>
                </div>
                @elseif($transaction->status === 'pending' && $transaction->snap_token)
                <div class="mt-4">
                    <button onclick="continuePayment('{{ $transaction->snap_token }}')"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <i class="fas fa-credit-card mr-2"></i>Lanjutkan Pembayaran
                    </button>
                </div>
                @endif
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Transaksi</h3>
                <p class="text-gray-400 mb-6">Mulai berbelanja untuk melihat riwayat transaksi Anda</p>
                <a href="{{ route('toko') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    Mulai Belanja
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($transactions->hasPages())
        <div class="mt-8">
            {{ $transactions->links() }}
        </div>
        @endif
    </div>
</div>

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
</script>
@endsection