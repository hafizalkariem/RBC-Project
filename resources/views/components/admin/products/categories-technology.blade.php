<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
    <!-- Categories -->
    <div class="glass-dark rounded-xl p-6 hover-lift animate-slideIn">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold gradient-text mb-1">Categories</h3>
                <p class="text-gray-400 text-sm">Product categories</p>
            </div>
            <button class="text-red-400 hover:text-red-300 hover:bg-red-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="space-y-4">
            @forelse($categories as $index => $category)
            <div class="flex justify-between items-center p-4 bg-slate-800/50 rounded-lg hover-lift transition-all duration-300 hover:bg-slate-700/50">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-{{ ['blue', 'green', 'purple', 'yellow', 'cyan', 'pink'][$index % 6] }}-500/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-{{ $category->icon ?? 'box' }} text-{{ ['blue', 'green', 'purple', 'yellow', 'cyan', 'pink'][$index % 6] }}-400 text-sm"></i>
                    </div>
                    <span class="text-gray-300 font-medium">{{ $category->name }}</span>
                </div>
                <span class="bg-{{ ['blue', 'green', 'purple', 'yellow', 'cyan', 'pink'][$index % 6] }}-500/20 text-{{ ['blue', 'green', 'purple', 'yellow', 'cyan', 'pink'][$index % 6] }}-400 px-3 py-1 rounded-full text-xs font-medium">{{ $category->products_count }} products</span>
            </div>
            @empty
            <div class="text-center text-gray-400 py-4">No categories found</div>
            @endforelse
        </div>
    </div>

    <!-- Technologies -->
    <div class="glass-dark rounded-xl p-6 hover-lift animate-slideIn" style="animation-delay: 0.2s;">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold gradient-text mb-1">Technologies</h3>
                <p class="text-gray-400 text-sm">Tech stack overview</p>
            </div>
            <button class="text-red-400 hover:text-red-300 hover:bg-red-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="flex flex-wrap gap-3">
            @forelse($technologies as $index => $tech)
            <span class="tech-tag bg-{{ ['red', 'cyan', 'green', 'blue', 'purple', 'yellow', 'pink', 'orange'][$index % 8] }}-500/20 text-{{ ['red', 'cyan', 'green', 'blue', 'purple', 'yellow', 'pink', 'orange'][$index % 8] }}-400 px-3 py-2 rounded-lg text-sm font-medium">
                @if($tech->logo_url)
                <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-4 h-4 inline-block mr-2">
                @endif
                {{ $tech->name }}
            </span>
            @empty
            <div class="text-center text-gray-400 py-4">No technologies found</div>
            @endforelse
        </div>
    </div>

    <!-- Sales Performance -->
    <div class="glass-dark rounded-xl p-6 hover-lift animate-slideIn" style="animation-delay: 0.4s;">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold gradient-text mb-1">Sales Performance</h3>
                <p class="text-gray-400 text-sm">Monthly overview</p>
            </div>
            <div class="text-green-400 text-sm font-medium">
                <i class="fas fa-arrow-up mr-1"></i>+{{ rand(10, 30) }}%
            </div>
        </div>
        <div class="space-y-4">
            @foreach($products->take(4) as $product)
            <div class="flex justify-between items-center">
                <span class="text-gray-300">{{ $product->name }}</span>
                <span class="text-green-400 font-medium">${{ number_format($product->price * rand(10, 50), 0) }}</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ rand(40, 90) }}%"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>