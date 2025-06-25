<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
    <!-- Recent Activity -->
    <div class="glass-dark rounded-xl p-6 hover-lift" data-aos="fade-up" data-aos-delay="100">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold gradient-text mb-1">Recent Activity</h3>
                <p class="text-gray-400 text-sm">Latest product updates</p>
            </div>
            <button class="text-red-400 hover:text-red-300 text-sm">View All</button>
        </div>
        <div class="space-y-4">
            @forelse($stats['recent_products'] as $index => $product)
            <div class="flex items-center space-x-4 p-3 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-plus text-green-400 text-sm"></i>
                </div>
                <div class="flex-1">
                    <div class="text-white text-sm font-medium">Product added</div>
                    <div class="text-gray-400 text-xs">{{ $product->name }} - {{ $product->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-inbox text-3xl mb-2"></i>
                <p>No recent activity</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="glass-dark rounded-xl p-6 hover-lift" data-aos="fade-up" data-aos-delay="200">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold gradient-text mb-1">Quick Stats</h3>
                <p class="text-gray-400 text-sm">Performance metrics</p>
            </div>
            <div class="flex space-x-2">
                <button class="text-gray-400 hover:text-white text-sm px-2 py-1 rounded transition-all duration-300">7D</button>
                <button class="text-white bg-red-500/20 text-sm px-2 py-1 rounded transition-all duration-300">30D</button>
                <button class="text-gray-400 hover:text-white text-sm px-2 py-1 rounded transition-all duration-300">90D</button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-green-400 mb-1">{{ $stats['total_sales'] ?: '0' }}</div>
                <div class="text-gray-400 text-sm">Total Sales</div>
                @if($stats['total_sales'] > 0)
                <div class="text-green-400 text-xs mt-1">
                    <i class="fas fa-check mr-1"></i>Active
                </div>
                @else
                <div class="text-gray-400 text-xs mt-1">
                    <i class="fas fa-minus mr-1"></i>No sales yet
                </div>
                @endif
            </div>
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-blue-400 mb-1">Rp {{ number_format($stats['total_revenue'] ?: 0) }}</div>
                <div class="text-gray-400 text-sm">Revenue</div>
                @if($stats['total_revenue'] > 0)
                <div class="text-blue-400 text-xs mt-1">
                    <i class="fas fa-dollar-sign mr-1"></i>Earned
                </div>
                @else
                <div class="text-gray-400 text-xs mt-1">
                    <i class="fas fa-minus mr-1"></i>No revenue yet
                </div>
                @endif
            </div>
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-yellow-400 mb-1">Rp {{ number_format($stats['avg_price'] ?: 0) }}</div>
                <div class="text-gray-400 text-sm">Avg Price</div>
                @if($stats['avg_price'] > 0)
                <div class="text-yellow-400 text-xs mt-1">
                    <i class="fas fa-tag mr-1"></i>Per product
                </div>
                @else
                <div class="text-gray-400 text-xs mt-1">
                    <i class="fas fa-minus mr-1"></i>No products
                </div>
                @endif
            </div>
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-purple-400 mb-1">{{ $stats['products_with_source'] }}/{{ $products->count() }}</div>
                <div class="text-gray-400 text-sm">With Source</div>
                @if($products->count() > 0)
                <div class="text-purple-400 text-xs mt-1">
                    <i class="fas fa-code mr-1"></i>{{ round(($stats['products_with_source'] / $products->count()) * 100) }}%
                </div>
                @else
                <div class="text-gray-400 text-xs mt-1">
                    <i class="fas fa-minus mr-1"></i>No products
                </div>
                @endif
            </div>
        </div>
    </div>
</div>