<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
    <!-- Recent Activity -->
    <div class="glass-dark rounded-xl p-6 hover-lift animate-fadeInUp" style="animation-delay: 0.6s;">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold gradient-text mb-1">Recent Activity</h3>
                <p class="text-gray-400 text-sm">Latest product updates</p>
            </div>
            <button class="text-red-400 hover:text-red-300 text-sm">View All</button>
        </div>
        <div class="space-y-4">
            @foreach($products->take(4) as $index => $product)
            <div class="flex items-center space-x-4 p-3 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="w-10 h-10 bg-{{ ['green', 'blue', 'yellow', 'purple'][$index % 4] }}-500/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-{{ ['plus', 'edit', 'shopping-cart', 'star'][$index % 4] }} text-{{ ['green', 'blue', 'yellow', 'purple'][$index % 4] }}-400 text-sm"></i>
                </div>
                <div class="flex-1">
                    <div class="text-white text-sm font-medium">{{ ['New product added', 'Product updated', 'New purchase', 'New review received'][$index % 4] }}</div>
                    <div class="text-gray-400 text-xs">{{ $product->name }} - {{ $product->updated_at->diffForHumans() }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="glass-dark rounded-xl p-6 hover-lift animate-fadeInUp" style="animation-delay: 0.8s;">
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
                <div class="text-2xl font-bold text-green-400 mb-1">{{ $products->count() * rand(2, 5) }}</div>
                <div class="text-gray-400 text-sm">Total Sales</div>
                <div class="text-green-400 text-xs mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>+{{ rand(5, 20) }}%
                </div>
            </div>
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-blue-400 mb-1">{{ number_format($products->count() * rand(50, 200)) }}</div>
                <div class="text-gray-400 text-sm">Page Views</div>
                <div class="text-blue-400 text-xs mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>+{{ rand(5, 15) }}%
                </div>
            </div>
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-yellow-400 mb-1">4.{{ rand(5, 9) }}</div>
                <div class="text-gray-400 text-sm">Avg Rating</div>
                <div class="text-yellow-400 text-xs mt-1">
                    <i class="fas fa-star mr-1"></i>Excellent
                </div>
            </div>
            <div class="text-center p-4 bg-slate-800/30 rounded-lg hover-lift transition-all duration-300">
                <div class="text-2xl font-bold text-purple-400 mb-1">{{ rand(80, 95) }}%</div>
                <div class="text-gray-400 text-sm">Satisfaction</div>
                <div class="text-purple-400 text-xs mt-1">
                    <i class="fas fa-heart mr-1"></i>Great
                </div>
            </div>
        </div>
    </div>
</div>