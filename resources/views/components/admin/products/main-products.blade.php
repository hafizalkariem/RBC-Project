<div class="glass-dark rounded-xl p-6 hover-lift animate-fadeInUp" style="animation-delay: 0.2s;">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold gradient-text mb-2">Products Management</h2>
            <p class="text-gray-400 text-sm">Manage your digital products and services</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-white transition-all duration-300 hover-lift">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
            <button class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-white transition-all duration-300 hover-lift">
                <i class="fas fa-download mr-2"></i>Export
            </button>
            <button class="red-gradient px-4 py-2 rounded-lg text-white hover:red-gradient-hover transition-all duration-300 animate-glow hover-lift">
                <i class="fas fa-plus mr-2"></i>Add Product
            </button>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <div class="flex-1 relative">
            <input type="text" placeholder="Search products..."
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 pl-10 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all duration-300">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        <select class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all duration-300">
            <option>All Categories</option>
            @foreach($categories as $category)
            <option>{{ $category->name }}</option>
            @endforeach
        </select>
        <select class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all duration-300">
            <option>All Status</option>
            @foreach(['hot', 'premium', 'best', 'new'] as $status)
            <option>{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left table-auto">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="pb-4 text-gray-300 font-semibold">
                        <div class="flex items-center space-x-2">
                            <span>ID</span>
                            <i class="fas fa-sort text-xs"></i>
                        </div>
                    </th>

                    <th class="pb-4 text-gray-300 font-semibold">
                        <div class="flex items-center space-x-2">
                            <span>Name</span>
                            <i class="fas fa-sort text-xs"></i>
                        </div>
                    </th>
                    <th class="pb-4 text-gray-300 font-semibold">Category</th>
                    <th class="pb-4 text-gray-300 font-semibold">Technologies</th>
                    <th class="pb-4 text-gray-300 font-semibold">
                        <div class="flex items-center space-x-2">
                            <span>Price</span>
                            <i class="fas fa-sort text-xs"></i>
                        </div>
                    </th>
                    <th class="pb-4 text-gray-300 font-semibold">Status</th>
                    <th class="pb-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)

                <tr class="border-b border-gray-800 table-row">
                    <td class="py-4 text-gray-300 font-medium">#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-{{ ['red', 'cyan', 'purple', 'green', 'blue', 'yellow'][$index % 6] }}-500 to-{{ ['orange', 'blue', 'pink', 'teal', 'indigo', 'red'][$index % 6] }}-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-{{ $product->category->icon ?? 'box' }} text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-medium">{{ $product->name }}</div>
                                <div class="text-gray-400 text-sm">{{ Str::limit($product->description, 20) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 text-gray-300">{{ $product->category->name ?? 'N/A' }}</td>
                    <td class="py-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach($product->technologies as $tech)
                            <span class="tech-tag  text-blue-400 px-2 py-1 rounded text-xs flex items-center gap-1">
                                <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-4 h-4">
                                {{ $tech->name }}
                            </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="py-4 text-green-400 font-bold">${{ number_format($product->price, 0) }}</td>
                    <td class="py-4">
                        @if($product->status)

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

                        @endif
                    </td>
                    <td class="py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a href="{{ route('admin.products.show', $product) }}" class="text-green-400 hover:text-green-300 hover:bg-green-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button class="text-red-400 hover:text-red-300 hover:bg-red-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-gray-400">No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        <div class="text-gray-400 text-sm">
            Showing {{ $products->count() }} of {{ $products->count() }} products
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition-all duration-300 hover-lift">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-3 py-2 bg-red-500 hover:bg-red-600 rounded-lg text-white transition-all duration-300 hover-lift">1</button>
            <button class="px-3 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition-all duration-300 hover-lift">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>