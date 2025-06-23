<div class="glass-dark rounded-xl p-6 mt-8 hover-lift animate-fadeInUp" style="animation-delay: 1s;">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold gradient-text mb-1">Top Selling Products</h3>
            <p class="text-gray-400 text-sm">Best performers this month</p>
        </div>
        <div class="flex space-x-2">
            <button class="text-red-400 hover:text-red-300 text-sm">Export</button>
            <button class="text-red-400 hover:text-red-300 text-sm">View Report</button>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products->take(3) as $index => $product)
        <a href="{{ route('admin.products.show', $product) }}" class="block relative bg-gradient-to-br from-{{ ['red', 'cyan', 'purple'][$index] }}-500/10 to-{{ ['red', 'blue', 'pink'][$index] }}-600/5 border border-{{ ['red', 'cyan', 'purple'][$index] }}-500/20 rounded-xl p-6 hover-lift transition-all duration-300 overflow-hidden cursor-pointer">
            <div class="absolute top-0 right-0 w-20 h-20 bg-{{ ['red', 'cyan', 'purple'][$index] }}-500/10 rounded-full -mr-10 -mt-10"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-{{ ['red', 'cyan', 'purple'][$index] }}-500 to-{{ ['red', 'blue', 'pink'][$index] }}-{{ ['600', '500', '500'][$index] }} rounded-xl flex items-center justify-center">
                        <i class="fas fa-{{ $product->category->icon ?? 'box' }} text-white"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-white">{{ rand(10, 30) }}</div>
                        <div class="text-{{ ['red', 'cyan', 'purple'][$index] }}-400 text-sm">Sales</div>
                    </div>
                </div>
                <div class="text-white font-semibold mb-1">{{ $product->name }}</div>
                <div class="text-gray-400 text-sm mb-3">${{ number_format($product->price, 0) }} per sale</div>
                <div class="flex justify-between items-center">
                    <span class="text-green-400 font-bold">${{ number_format($product->price * rand(10, 30), 0) }}</span>
                    <span class="bg-green-500/20 text-green-400 px-2 py-1 rounded-full text-xs">
                        <i class="fas fa-arrow-up mr-1"></i>+{{ rand(10, 30) }}%
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>