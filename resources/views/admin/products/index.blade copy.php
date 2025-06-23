@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="glass-dark rounded-xl p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">Products Management</h2>
        <button class="red-gradient px-4 py-2 rounded-lg text-white hover:red-gradient-hover transition-all duration-300 glow-red">
            <i class="fas fa-plus mr-2"></i>Add Product
        </button>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="pb-3 text-gray-300">ID</th>
                    <th class="pb-3 text-gray-300">Name</th>
                    <th class="pb-3 text-gray-300">Category</th>
                    <th class="pb-3 text-gray-300">Technologies</th>
                    <th class="pb-3 text-gray-300">Price</th>
                    <th class="pb-3 text-gray-300">Status</th>
                    <th class="pb-3 text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-b border-gray-800">
                    <td class="py-4 text-gray-300">{{ $product->id }}</td>
                    <td class="py-4 text-white">{{ $product->name }}</td>
                    <td class="py-4 text-gray-300">{{ $product->category->name ?? 'N/A' }}</td>
                    <td class="py-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach($product->technologies as $tech)
                            <span class="bg-blue-500/20 text-blue-400 px-2 py-1 rounded text-xs">{{ $tech->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="py-4 text-green-400">${{ number_format($product->price, 0) }}</td>
                    <td class="py-4">
                        <span class="bg-{{ $product->status == 'active' ? 'green' : 'red' }}-500/20 text-{{ $product->status == 'active' ? 'green' : 'red' }}-400 px-2 py-1 rounded-full text-xs">{{ ucfirst($product->status) }}</span>
                    </td>
                    <td class="py-4">
                        <button class="text-blue-400 hover:text-blue-300 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-400 hover:text-red-300">
                            <i class="fas fa-trash"></i>
                        </button>
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
</div>

<!-- Categories & Technologies Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
    <!-- Categories -->
    <div class="glass-dark rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-white">Categories</h3>
            <button class="text-red-400 hover:text-red-300">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="space-y-3">
            @forelse($categories as $category)
            <div class="flex justify-between items-center p-3 bg-slate-800/50 rounded-lg">
                <span class="text-gray-300">{{ $category->name }}</span>
                <span class="bg-blue-500/20 text-blue-400 px-2 py-1 rounded text-xs">{{ $category->products_count }} products</span>
            </div>
            @empty
            <div class="text-center text-gray-400 py-4">No categories found</div>
            @endforelse
        </div>
    </div>

    <!-- Technologies -->
    <div class="glass-dark rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-white">Technologies</h3>
            <button class="text-red-400 hover:text-red-300">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="flex flex-wrap gap-2">
            @forelse($technologies as $tech)
            <span class="bg-blue-500/20 text-blue-400 px-3 py-2 rounded-lg text-sm">{{ $tech->name }}</span>
            @empty
            <div class="text-center text-gray-400 py-4">No technologies found</div>
            @endforelse
        </div>
    </div>
</div>
@endsection