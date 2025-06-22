<div class="mb-8 overflow-x-auto animate-slide-up">
    <nav class="flex gap-4 whitespace-nowrap p-4">
        <a href="{{ route('toko') }}" class="category-pill px-6 py-3 rounded-full {{ !request('category') ? 'glass-button' : 'glass' }} text-white font-semibold hover:bg-blue-500/50 transition-all duration-300">
            <i class="fas fa-star mr-2"></i>Semua
        </a>
        @foreach($categories as $category)
        <a href="{{ route('toko', ['category' => $category->id]) }}" class="category-pill px-6 py-3 rounded-full {{ request('category') == $category->id ? 'glass-button' : 'glass' }} text-white/90 hover:glass-button transition-all duration-300">
            <i class="{{ $category->icon }} mr-2"></i>{{ $category->name }}
        </a>
        @endforeach
    </nav>
</div>