<div class="flex justify-between items-center mt-6">
    <div class="text-gray-400 text-sm">
        Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
    </div>
    <div class="flex space-x-2">
        @if ($products->onFirstPage())
            <button disabled class="px-3 py-2 bg-gray-800 text-gray-600 rounded-lg cursor-not-allowed">
                <i class="fas fa-chevron-left"></i>
            </button>
        @else
            <button onclick="changePage({{ $products->currentPage() - 1 }})" class="px-3 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition-all duration-300 hover-lift">
                <i class="fas fa-chevron-left"></i>
            </button>
        @endif

        @foreach ($products->getUrlRange(max(1, $products->currentPage() - 2), min($products->lastPage(), $products->currentPage() + 2)) as $page => $url)
            @if ($page == $products->currentPage())
                <button class="px-3 py-2 bg-red-500 text-white rounded-lg">{{ $page }}</button>
            @else
                <button onclick="changePage({{ $page }})" class="px-3 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition-all duration-300 hover-lift">{{ $page }}</button>
            @endif
        @endforeach

        @if ($products->hasMorePages())
            <button onclick="changePage({{ $products->currentPage() + 1 }})" class="px-3 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition-all duration-300 hover-lift">
                <i class="fas fa-chevron-right"></i>
            </button>
        @else
            <button disabled class="px-3 py-2 bg-gray-800 text-gray-600 rounded-lg cursor-not-allowed">
                <i class="fas fa-chevron-right"></i>
            </button>
        @endif
    </div>
</div>