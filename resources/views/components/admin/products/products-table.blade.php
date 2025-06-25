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
            <span class="tech-tag text-blue-400 px-2 py-1 rounded text-xs flex items-center gap-1">
                <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-4 h-4">
                {{ $tech->name }}
            </span>
            @endforeach
        </div>
    </td>
    <td class="py-4 text-green-400 font-bold">Rp {{ number_format($product->price, 0) }}</td>
    <td class="py-4">
        @if($product->hasSourceCode())
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full flex items-center">
                    <i class="fas fa-check-circle mr-1"></i>
                    Available
                </span>
                <span class="text-gray-400 text-xs">{{ $product->source_code_size }}</span>
            </div>
        @else
            <span class="px-2 py-1 bg-red-500/20 text-red-400 text-xs rounded-full flex items-center">
                <i class="fas fa-times-circle mr-1"></i>
                Missing
            </span>
        @endif
    </td>
    <td class="py-4">
        <x-product-status :status="$product->status" />
    </td>
    <td class="py-4">
        <div class="flex space-x-2">
            <button onclick="openEditProductModal({{ $product->id }})" class="text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                <i class="fas fa-edit"></i>
            </button>
            <a href="{{ route('admin.products.show', $product) }}" class="text-green-400 hover:text-green-300 hover:bg-green-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                <i class="fas fa-eye"></i>
            </a>
            <button onclick="deleteProduct({{ $product->id }}, '{{ $product->name }}')" class="text-red-400 hover:text-red-300 hover:bg-red-500/10 p-2 rounded-lg transition-all duration-300 hover-lift">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="8" class="py-8 text-center text-gray-400">No products found</td>
</tr>
@endforelse