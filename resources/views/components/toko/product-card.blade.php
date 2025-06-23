<div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-blue-500/20 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s">
    <div class="relative mb-6 overflow-hidden rounded-2xl">
        <img src="{{ $product->image_url }}"
            alt="{{ $product->name }}"
            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
        @if($product->status)
        <div class="absolute top-4 right-4">
            <span class="px-3 py-1 
                        @if($product->status == 'hot') bg-green-500/80 
                        @elseif($product->status == 'premium') bg-purple-500/80 
                        @elseif($product->status == 'best') bg-pink-500/80 
                        @else bg-blue-500/80 @endif 
                        text-white text-sm rounded-full backdrop-blur-sm">
                <i class="
                            @if($product->status == 'hot') fas fa-fire 
                            @elseif($product->status == 'premium') fas fa-crown 
                            @elseif($product->status == 'best') fas fa-star 
                            @else fas fa-bolt @endif 
                            mr-1"></i>{{ ucfirst($product->status) }}
            </span>
        </div>
        @endif
    </div>
    <div class="space-y-4">
        <h3 class="text-xl font-bold group-hover:text-blue-300 transition-colors">{{ $product->name }}</h3>
        <p class="text-white/70 text-sm leading-relaxed">{{ $product->description }}</p>

        <div class="flex items-center justify-between text-sm text-white/60 mb-2">
            <div class="flex items-center gap-2">
                @if($product->technologies && $product->technologies->count() > 0)
                    @foreach($product->technologies as $tech)
                    @if($tech->logo_url)
                    <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-5 h-5">
                    @endif
                    @endforeach
                    <span class="ml-2">{{ $product->technologies->pluck('name')->join(', ') }}</span>
                @else
                    <span class="ml-2">No technologies</span>
                @endif
            </div>
            @if($product->developer)
            <div class="flex items-center gap-2">
                <img src="{{ $product->developer->photo_url }}" alt="{{ $product->developer->name }}" class="w-6 h-6 rounded-full object-cover border border-white/20">
                <span class="text-xs text-white/70">{{ $product->developer->name }}</span>
            </div>
            @endif
        </div>

        <div class="flex items-center justify-between pt-4">
            <div>
                <span class="text-2xl font-bold text-blue-300">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                @if($product->original_price)
                <span class="text-sm text-white/50 line-through ml-2">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                @endif
            </div>
            <button onclick="addToCart({{ $product->id }})" class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                <i class="fas fa-shopping-cart mr-2"></i>Beli
            </button>
        </div>
    </div>
</div>