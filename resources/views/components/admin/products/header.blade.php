<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-fadeInUp">
    <div class="stat-card hover-lift rounded-xl p-6 text-center floating">
        <div class="text-3xl font-bold gradient-text mb-2">{{ $products->count() }}</div>
        <div class="text-gray-300 text-sm">Total Products</div>
        <div class="progress-bar mt-3">
            <div class="progress-fill" style="width: {{ $products->count() > 0 ? min(($products->count() / 50) * 100, 100) : 0 }}%"></div>
        </div>
    </div>
    <div class="stat-card hover-lift rounded-xl p-6 text-center floating" style="animation-delay: 0.4s;">
        <div class="text-3xl font-bold text-yellow-400 mb-2">Rp. {{ number_format($products->sum('price'), 1) }}</div>
        <div class="text-gray-300 text-sm">Total Value</div>
        <div class="progress-bar mt-3">
            <div class="progress-fill" style="width: {{ $products->sum('price') > 0 ? min(($products->sum('price') / 20000) * 100, 100) : 0 }}%"></div>
        </div>
    </div>
    <div class="stat-card hover-lift rounded-xl p-6 text-center floating" style="animation-delay: 0.6s;">
        <div class="text-3xl font-bold text-blue-400 mb-2">{{ $categories->count() }}</div>
        <div class="text-gray-300 text-sm">Categories</div>
        <div class="progress-bar mt-3">
            <div class="progress-fill" style="width: {{ $categories->count() > 0 ? min(($categories->count() / 15) * 100, 100) : 0 }}%"></div>
        </div>
    </div>
    <div class="stat-card hover-lift rounded-xl p-6 text-center floating" style="animation-delay: 0.6s;">
        <div class="text-3xl font-bold text-blue-400 mb-2">{{ $products->where('status', 'hot')->count() }}</div>
        <div class="text-gray-300 text-sm">Hot Products</div>
        <div class="progress-bar mt-3">
            <div class="progress-fill" style="width: {{ $products->where('status', 'hot')->count() > 0 ? min(($products->where('status', 'hot')->count() / 15) * 100, 100) : 0 }}%"></div>
        </div>
    </div>
    <div class="stat-card hover-lift rounded-xl p-6 text-center floating" style="animation-delay: 0.8s;">
        <div class="text-3xl font-bold text-purple-400 mb-2">{{ $products->where('status', 'premium')->count() }}</div>
        <div class="text-gray-300 text-sm">Premium Products</div>
        <div class="progress-bar mt-3">
            <div class="progress-fill" style="width: {{ $products->where('status', 'premium')->count() > 0 ? min(($products->where('status', 'premium')->count() / 15) * 100, 100) : 0 }}%"></div>
        </div>
    </div>
    <div class="stat-card hover-lift rounded-xl p-6 text-center floating" style="animation-delay: 1s;">
        <div class="text-3xl font-bold text-green-400 mb-2">{{ $products->where('status', 'best')->count() }}</div>
        <div class="text-gray-300 text-sm">Best Products</div>
        <div class="progress-bar mt-3">
            <div class="progress-fill" style="width: {{ $products->where('status', 'best')->count() > 0 ? min(($products->where('status', 'best')->count() / 15) * 100, 100) : 0 }}%"></div>
        </div>
    </div>
</div>