<a href="{{ route('toko.product.show', $product) }}" class="block">
<div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-blue-500/20 animate-fade-in cursor-pointer" style="animation-delay: {{ $index * 0.1 }}s">
    <div class="relative mb-6 overflow-hidden rounded-2xl bg-gray-800 product-image">
        <img src="{{ $product->image_url }}"
            alt="{{ $product->name }}"
            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
onerror="this.src='data:image/svg+xml;base64,{{ base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#6366f1"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="14">' . htmlspecialchars($product->name) . '</text></svg>') }}'; this.onerror=null;"
            onload="this.parentElement.classList.remove('loading')"
            onloadstart="this.parentElement.classList.add('loading')"
            loading="lazy">
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
                    <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-5 h-5 rounded" 
                         onerror="this.style.display='none'; this.onerror=null;">
                    @endif
                    @endforeach
                    <span class="ml-2">{{ $product->technologies->pluck('name')->join(', ') }}</span>
                @else
                    <span class="ml-2">No technologies</span>
                @endif
            </div>
            @if($product->developer)
            <div class="flex items-center gap-2">
                <img src="{{ $product->developer->photo_url ?: 'https://ui-avatars.com/api/?name=' . urlencode($product->developer->name) . '&background=6366f1&color=ffffff&size=24' }}" 
                     alt="{{ $product->developer->name }}" 
                     class="w-6 h-6 rounded-full object-cover border border-white/20"
                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($product->developer->name) }}&background=6366f1&color=ffffff&size=24'; this.onerror=null;">
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
            <span class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105 inline-block">
                <i class="fas fa-eye mr-2"></i>Preview
            </span>
        </div>
    </div>
</div>
</a>