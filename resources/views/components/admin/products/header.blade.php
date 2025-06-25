<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="relative bg-gradient-to-br from-red-500/10 to-red-600/5 border border-red-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden floating" data-aos="zoom-in">
        <div class="absolute top-0 right-0 w-20 h-20 bg-red-500/10 rounded-full -mr-10 -mt-10"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-white"></i>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-white">{{ $products->total() }}</div>
                    <div class="text-red-400 text-sm">Items</div>
                </div>
            </div>
            <div class="text-white font-semibold mb-1">Total Products</div>
            <div class="text-gray-400 text-sm mb-3">All products in system</div>
        </div>
    </div>
    <div class="relative bg-gradient-to-br from-cyan-500/10 to-blue-600/5 border border-cyan-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden floating" data-aos="zoom-in" data-aos-delay="100">
        <div class="absolute top-0 right-0 w-20 h-20 bg-cyan-500/10 rounded-full -mr-10 -mt-10"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-white"></i>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-white">Rp. {{ number_format($allProducts->sum('price'), 0) }}</div>
                    <div class="text-cyan-400 text-sm">Value</div>
                </div>
            </div>
            <div class="text-white font-semibold mb-1">Total Value</div>
            <div class="text-gray-400 text-sm mb-3">Combined product value</div>
        </div>
    </div>
    <div class="relative bg-gradient-to-br from-purple-500/10 to-pink-600/5 border border-purple-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden floating" data-aos="zoom-in" data-aos-delay="200">
        <div class="absolute top-0 right-0 w-20 h-20 bg-purple-500/10 rounded-full -mr-10 -mt-10"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-tags text-white"></i>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-white">{{ $categories->count() }}</div>
                    <div class="text-purple-400 text-sm">Types</div>
                </div>
            </div>
            <div class="text-white font-semibold mb-1">Categories</div>
            <div class="text-gray-400 text-sm mb-3">Product categories</div>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="relative bg-gradient-to-br from-orange-500/10 to-red-600/5 border border-orange-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden floating" data-aos="zoom-in" data-aos-delay="300">
        <div class="absolute top-0 right-0 w-20 h-20 bg-orange-500/10 rounded-full -mr-10 -mt-10"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-fire text-white"></i>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-white">{{ $allProducts->where('status', 'hot')->count() }}</div>
                    <div class="text-orange-400 text-sm">Hot</div>
                </div>
            </div>
            <div class="text-white font-semibold mb-1">Hot Products</div>
            <div class="text-gray-400 text-sm mb-3">Trending products</div>
        </div>
    </div>
    <div class="relative bg-gradient-to-br from-violet-500/10 to-purple-600/5 border border-violet-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden floating" data-aos="zoom-in" data-aos-delay="400">
        <div class="absolute top-0 right-0 w-20 h-20 bg-violet-500/10 rounded-full -mr-10 -mt-10"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-violet-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-crown text-white"></i>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-white">{{ $allProducts->where('status', 'premium')->count() }}</div>
                    <div class="text-violet-400 text-sm">Premium</div>
                </div>
            </div>
            <div class="text-white font-semibold mb-1">Premium Products</div>
            <div class="text-gray-400 text-sm mb-3">Premium quality</div>
        </div>
    </div>
    <div class="relative bg-gradient-to-br from-green-500/10 to-emerald-600/5 border border-green-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden floating" data-aos="zoom-in" data-aos-delay="500">
        <div class="absolute top-0 right-0 w-20 h-20 bg-green-500/10 rounded-full -mr-10 -mt-10"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-star text-white"></i>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-white">{{ $allProducts->where('status', 'best')->count() }}</div>
                    <div class="text-green-400 text-sm">Best</div>
                </div>
            </div>
            <div class="text-white font-semibold mb-1">Best Products</div>
            <div class="text-gray-400 text-sm mb-3">Top rated products</div>
        </div>
    </div>
</div>