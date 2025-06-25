<div class="glass-dark rounded-xl p-6 hover-lift" data-aos="fade-up">
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
            <button onclick="openAddProductModal()" class="red-gradient px-4 py-2 rounded-lg text-white hover:red-gradient-hover transition-all duration-300 animate-glow hover-lift">
                <i class="fas fa-plus mr-2"></i>Add Product
            </button>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <div class="flex-1 relative">
            <input type="text" id="searchInput" placeholder="Search products..." value="{{ request('search') }}"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 pl-10 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all duration-300">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        <select id="categoryFilter" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all duration-300">
            <option value="">All Categories</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <select id="statusFilter" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all duration-300">
            <option value="">All Status</option>
            @foreach(['hot', 'premium', 'best', 'new'] as $status)
            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button onclick="clearFilters()" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition-all duration-300">
            <i class="fas fa-times mr-2"></i>Clear
        </button>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-hidden">
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
                    <th class="pb-4 text-gray-300 font-semibold">Source Code</th>
                    <th class="pb-4 text-gray-300 font-semibold">Status</th>
                    <th class="pb-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody id="productsTableBody">
                <x-admin.products.products-table :products="$products" />
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div id="paginationContainer">
        <x-admin.products.pagination :products="$products" />
    </div>
</div>