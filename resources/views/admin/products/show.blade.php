@extends('layouts.admin')

@section('title', $product->name)

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="glass-dark rounded-xl p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.products') }}" class="text-gray-400 hover:text-white transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-white">{{ $product->name }}</h1>
                    <p class="text-gray-400">Product Details</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white transition-all duration-300">
                    <i class="fas fa-edit mr-2"></i>Edit
                </button>
                <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white transition-all duration-300">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Product Info -->
            <div class="glass-dark rounded-xl p-6">
                <h2 class="text-xl font-bold text-white mb-4">Product Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 mb-2">Name</label>
                        <div class="bg-slate-800 p-3 rounded-lg text-white">{{ $product->name }}</div>
                    </div>
                    <div>
                        <label class="block text-gray-300 mb-2">Category</label>
                        <div class="bg-slate-800 p-3 rounded-lg text-white">{{ $product->category->name ?? 'N/A' }}</div>
                    </div>
                    <div>
                        <label class="block text-gray-300 mb-2">Price</label>
                        <div class="bg-slate-800 p-3 rounded-lg text-green-400 font-bold">Rp. {{ number_format($product->price, 0) }}</div>
                    </div>
                    <div>
                        <label class="block text-gray-300 mb-2">Status</label>
                        <div class="bg-slate-800 p-3 rounded-lg">
                            <x-product-status :status="$product->status" />
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Description</label>
                    <div class="bg-slate-800 p-3 rounded-lg text-white">{{ $product->description }}</div>
                </div>
            </div>

            <!-- Technologies -->
            <div class="glass-dark rounded-xl p-6">
                <h2 class="text-xl font-bold text-white mb-4">Technologies Used</h2>
                <div class="flex flex-wrap gap-3">
                    @forelse($product->technologies as $tech)
                    <span class="bg-blue-500/20 text-blue-400 px-3 py-2 rounded-lg text-sm flex items-center gap-2">
                        @if($tech->logo_url)
                        <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-4 h-4">
                        @endif
                        {{ $tech->name }}
                    </span> @empty
                    <p class="text-gray-400">No technologies specified</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Stats -->
            <div class="glass-dark rounded-xl p-6">
                <h2 class="text-xl font-bold text-white mb-4">Statistics</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Sales</span>
                        <span class="text-white font-bold">{{ $product->orderItems->sum('quantity') ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Revenue</span>
                        <span class="text-green-400 font-bold">Rp. {{ number_format($product->orderItems->sum(function($item) { return $item->quantity * $item->price; }) ?? 0, 0) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Views</span>
                        <span class="text-white font-bold">{{ $product->views ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <!-- Developer -->
            @if($product->developer)
            <div class="glass-dark rounded-xl p-6">
                <h2 class="text-xl font-bold text-white mb-4">Developer</h2>
                <div class="flex items-center space-x-3">
                    <img src="{{ $product->developer->photo_url }}" alt="{{ $product->developer->name }}" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <div class="text-white font-medium">{{ $product->developer->name }}</div>
                        <div class="text-gray-400 text-sm">{{ $product->developer->role }}</div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Actions -->
            <div class="glass-dark rounded-xl p-6">
                <h2 class="text-xl font-bold text-white mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <button class="w-full bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg text-white transition-all duration-300">
                        <i class="fas fa-eye mr-2"></i>View Live
                    </button>
                    <button class="w-full bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white transition-all duration-300">
                        <i class="fas fa-download mr-2"></i>Download
                    </button>
                    <button class="w-full bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg text-white transition-all duration-300">
                        <i class="fas fa-share mr-2"></i>Share
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection