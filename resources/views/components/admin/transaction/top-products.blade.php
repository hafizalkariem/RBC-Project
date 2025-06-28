@props(['topProducts' => []])

<div class="glass-dark rounded-xl p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-white">Produk Terlaris</h3>
        <div class="flex space-x-3">
            <select id="productPeriod" class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option value="7">7 Hari</option>
                <option value="30" selected>30 Hari</option>
                <option value="90">3 Bulan</option>
                <option value="all">Semua Waktu</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full" id="topProductsTable">
            <thead>
                <tr class="text-gray-400 text-sm border-b border-gray-700">
                    <th class="pb-3 text-left">Produk</th>
                    <th class="pb-3 text-center">Kategori</th>
                    <th class="pb-3 text-center">Terjual</th>
                    <th class="pb-3 text-right">Pendapatan</th>
                    <th class="pb-3 text-right">Tren</th>
                </tr>
            </thead>
            <tbody id="topProductsBody">
                @forelse($topProducts as $product)
                <tr class="border-b border-gray-800 hover:bg-gray-800/20 transition-all">
                    <td class="py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-700 rounded-lg mr-3 overflow-hidden">
                                @if($product['image_url'])
                                <img src="{{ Str::startsWith($product['image_url'], ['http://', 'https://']) ? $product['image_url'] : Storage::url($product['image_url']) }}" class="w-full h-full object-cover" alt="{{ $product['name'] }}">
                                @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-700 to-gray-800">
                                    <i class="fas fa-box"></i>
                                </div>
                                @endif
                            </div>
                            <div>
                                <div class="font-medium text-white">{{ $product['name'] }}</div>
                                <div class="text-sm text-gray-400">ID: {{ $product['id'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 text-center">
                        <span class="px-3 py-1 bg-gray-800 text-gray-300 rounded-full text-xs">
                            {{ $product['category'] }}
                        </span>
                    </td>
                    <td class="py-4 text-center">
                        <span class="font-medium text-white">{{ $product['sold'] }}</span>
                    </td>
                    <td class="py-4 text-right">
                        <span class="font-medium text-white">Rp {{ number_format($product['revenue'], 0, ',', '.') }}</span>
                    </td>
                    <td class="py-4 text-right">
                        @if($product['trend'] > 0)
                        <span class="text-green-400 flex items-center justify-end">
                            <i class="fas fa-arrow-up mr-1"></i> {{ $product['trend'] }}%
                        </span>
                        @elseif($product['trend'] < 0)
                            <span class="text-red-400 flex items-center justify-end">
                            <i class="fas fa-arrow-down mr-1"></i> {{ abs($product['trend']) }}%
                            </span>
                            @else
                            <span class="text-gray-400 flex items-center justify-end">
                                <i class="fas fa-minus mr-1"></i> 0%
                            </span>
                            @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-400">
                        <i class="fas fa-box-open text-4xl mb-3"></i>
                        <p>Belum ada data produk</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(count($topProducts) > 0)
    <div class="mt-6 text-center">
        <button class="text-red-400 hover:text-red-300 text-sm transition-colors">
            Lihat Semua Produk <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Period change for top products
        document.getElementById('productPeriod').addEventListener('change', function() {
            const period = this.value;
            const tbody = document.getElementById('topProductsBody');

            // Show loading state
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-400">
                        <i class="fas fa-spinner fa-spin text-4xl mb-3"></i>
                        <p>Memuat data...</p>
                    </td>
                </tr>
            `;

            // Fetch new data
            fetch(`{{ route('admin.transactions.index') }}?period=${period}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update table with new data
                    updateTopProductsTable(data.topProducts);
                })
                .catch(error => {
                    console.error('Error:', error);
                    tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="py-8 text-center text-red-400">
                            <i class="fas fa-exclamation-triangle text-4xl mb-3"></i>
                            <p>Gagal memuat data</p>
                        </td>
                    </tr>
                `;
                });
        });

        function updateTopProductsTable(products) {
            const tbody = document.getElementById('topProductsBody');

            if (products.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-400">
                            <i class="fas fa-box-open text-4xl mb-3"></i>
                            <p>Belum ada data produk</p>
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            products.forEach(product => {
                let trendHtml = '';
                if (product.trend > 0) {
                    trendHtml = `<span class="text-green-400 flex items-center justify-end">
                        <i class="fas fa-arrow-up mr-1"></i> ${product.trend}%
                    </span>`;
                } else if (product.trend < 0) {
                    trendHtml = `<span class="text-red-400 flex items-center justify-end">
                        <i class="fas fa-arrow-down mr-1"></i> ${Math.abs(product.trend)}%
                    </span>`;
                } else {
                    trendHtml = `<span class="text-gray-400 flex items-center justify-end">
                        <i class="fas fa-minus mr-1"></i> 0%
                    </span>`;
                }

                html += `
                    <tr class="border-b border-gray-800 hover:bg-gray-800/20 transition-all">
                        <td class="py-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-700 rounded-lg mr-3 overflow-hidden">
                                    ${product.image_url ? 
                                        `<img src="${product.image_url}" class="w-full h-full object-cover" alt="${product.name}">` :
                                        `<div class="w-full h-full flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-700 to-gray-800">
                                            <i class="fas fa-box"></i>
                                        </div>`
                                    }
                                </div>
                                <div>
                                    <div class="font-medium text-white">${product.name}</div>
                                    <div class="text-sm text-gray-400">ID: ${product.id}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 text-center">
                            <span class="px-3 py-1 bg-gray-800 text-gray-300 rounded-full text-xs">
                                ${product.category}
                            </span>
                        </td>
                        <td class="py-4 text-center">
                            <span class="font-medium text-white">${product.sold}</span>
                        </td>
                        <td class="py-4 text-right">
                            <span class="font-medium text-white">Rp ${new Intl.NumberFormat('id-ID').format(product.revenue)}</span>
                        </td>
                        <td class="py-4 text-right">
                            ${trendHtml}
                        </td>
                    </tr>
                `;
            });

            tbody.innerHTML = html;
        }
    });
</script>