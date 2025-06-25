@extends('layouts.app')

@section('fullwidth')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .glass-button {
        background: rgba(59, 130, 246, 0.3);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59, 130, 246, 0.4);
        transition: all 0.3s ease;
    }
    .glass-button:hover {
        background: rgba(59, 130, 246, 0.5);
        transform: translateY(-2px);
    }
    .dark-gradient-bg {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

</style>

<div class="dark-gradient-bg min-h-screen">
    <div class="container mx-auto px-4 py-20">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('toko') }}" class="glass-button px-6 py-3 rounded-xl text-white font-semibold inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Toko
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image & Info -->
            <div class="space-y-8">
                <!-- Product Image -->
                <div class="glass-card rounded-3xl p-6">
                    <div class="relative overflow-hidden rounded-2xl bg-gray-800">
                        <img src="{{ $product->image_url }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-80 object-cover"
                             onerror="this.src='data:image/svg+xml;base64,{{ base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="320" viewBox="0 0 400 320"><rect width="400" height="320" fill="#6366f1"/><text x="200" y="160" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">' . htmlspecialchars($product->name) . '</text></svg>') }}'">
                        
                        @if($product->status)
                        <div class="absolute top-4 right-4">
                            <span class="px-4 py-2 
                                        @if($product->status == 'hot') bg-green-500/80 
                                        @elseif($product->status == 'premium') bg-purple-500/80 
                                        @elseif($product->status == 'best') bg-pink-500/80 
                                        @else bg-blue-500/80 @endif 
                                        text-white rounded-full backdrop-blur-sm">
                                <i class="
                                            @if($product->status == 'hot') fas fa-fire 
                                            @elseif($product->status == 'premium') fas fa-crown 
                                            @elseif($product->status == 'best') fas fa-star 
                                            @else fas fa-bolt @endif 
                                            mr-2"></i>{{ ucfirst($product->status) }}
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Technologies -->
                @if($product->technologies && $product->technologies->count() > 0)
                <div class="glass-card rounded-3xl p-6">
                    <h3 class="text-xl font-bold text-white mb-4">Teknologi yang Digunakan</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach($product->technologies as $tech)
                        <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full">
                            @if($tech->logo_url)
                            <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-6 h-6 rounded">
                            @endif
                            <span class="text-white">{{ $tech->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Product Details -->
            <div class="space-y-8">
                <!-- Main Info -->
                <div class="glass-card rounded-3xl p-8">
                    <h1 class="text-4xl font-bold text-white mb-4">{{ $product->name }}</h1>
                    <p class="text-white/80 text-lg mb-6 leading-relaxed">{{ $product->description }}</p>
                    
                    <!-- Category -->
                    @if($product->category)
                    <div class="mb-6">
                        <span class="inline-block bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-sm">
                            <i class="fas fa-tag mr-2"></i>{{ $product->category->name }}
                        </span>
                    </div>
                    @endif

                    <!-- Developer Info -->
                    @if($product->developer)
                    <div class="flex items-center gap-4 mb-8 p-4 bg-white/5 rounded-2xl">
                        <img src="{{ $product->developer->photo_url ?: 'https://ui-avatars.com/api/?name=' . urlencode($product->developer->name) . '&background=6366f1&color=ffffff&size=48' }}" 
                             alt="{{ $product->developer->name }}" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-white/20">
                        <div>
                            <p class="text-white font-semibold">{{ $product->developer->name }}</p>
                            <p class="text-white/60 text-sm">Developer</p>
                        </div>
                    </div>
                    @endif

                    <!-- Price -->
                    <div class="mb-8">
                        <div class="flex items-center gap-4">
                            <span class="text-4xl font-bold text-blue-300">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            @if($product->original_price)
                            <span class="text-xl text-white/50 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        @if($product->preview_url)
                        <a href="{{ $product->preview_url }}" target="_blank" class="w-full glass-button px-8 py-4 rounded-xl text-white font-semibold text-lg block text-center">
                            <i class="fas fa-external-link-alt mr-3"></i>Live Preview
                        </a>
                        @else
                        <div class="w-full bg-gray-500/30 px-8 py-4 rounded-xl text-white/50 font-semibold text-lg text-center">
                            <i class="fas fa-eye-slash mr-3"></i>Preview Tidak Tersedia
                        </div>
                        @endif
                        <button onclick="addToCart({{ $product->id }})" class="w-full bg-green-500/30 hover:bg-green-500/50 px-8 py-4 rounded-xl text-white font-semibold text-lg transition-all">
                            <i class="fas fa-shopping-cart mr-3"></i>Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Additional Details -->
                @if($product->features || $product->requirements)
                <div class="glass-card rounded-3xl p-8">
                    @if($product->features)
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-white mb-4">Fitur Utama</h3>
                        <div class="text-white/80">{{ $product->features }}</div>
                    </div>
                    @endif
                    
                    @if($product->requirements)
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Requirements</h3>
                        <div class="text-white/80">{{ $product->requirements }}</div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function addToCart(productId) {
    // Add to cart functionality
    console.log('Adding product to cart:', productId);
    alert('Fitur keranjang belum diimplementasi');
}
</script>
@endsection