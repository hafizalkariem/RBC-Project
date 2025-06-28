@props(['transactions'])

<div class="space-y-4">
    <!-- Table Controls -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <!-- Search and Filter -->
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative">
                <input type="text"
                    id="searchTransactions"
                    placeholder="Cari transaksi..."
                    class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent w-full sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <select id="statusFilter" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="failed">Failed</option>
            </select>
        </div>

        <!-- Table Actions -->
        <div class="flex gap-2">
            <button id="refreshTable" class="red-gradient-hover px-4 py-2 rounded-lg text-sm glow-red flex items-center gap-2">
                <i class="fas fa-sync-alt"></i>
                Refresh
            </button>
            <button id="exportData" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-sm flex items-center gap-2 transition-colors">
                <i class="fas fa-download"></i>
                Export
            </button>
        </div>
    </div>

    <!-- Transaction Summary Cards -->


    <!-- Enhanced Table -->
    <div class="bg-gray-800/30 border border-gray-700 rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full" id="transactionTable">
                <thead class="bg-gray-800/50">
                    <tr class="border-b border-gray-700 text-gray-400 text-sm">
                        <th class="p-4 text-left">
                            <input type="checkbox" id="selectAll" class="rounded border-gray-600 bg-gray-700 text-red-500 focus:ring-red-500 focus:ring-2">
                        </th>
                        <th class="p-4 text-left cursor-pointer hover:text-gray-200 transition-colors" data-sort="index">
                            No. <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="p-4 text-left cursor-pointer hover:text-gray-200 transition-colors" data-sort="date">
                            Tanggal <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="p-4 text-left cursor-pointer hover:text-gray-200 transition-colors" data-sort="customer">
                            Customer <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="p-4 text-left">Produk</th>
                        <th class="p-4 text-right cursor-pointer hover:text-gray-200 transition-colors" data-sort="total">
                            Total <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="p-4 text-center cursor-pointer hover:text-gray-200 transition-colors" data-sort="status">
                            Status <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="border-b border-gray-800 hover:bg-gray-800/20 transition-all duration-200 group"
                        data-transaction-id="{{ $transaction->id }}"
                        data-status="{{ $transaction->status }}"
                        data-customer="{{ strtolower($transaction->user->name ?? 'n/a') }}"
                        data-total="{{ $transaction->total_amount }}">
                        <td class="p-4">
                            <input type="checkbox" class="transaction-checkbox rounded border-gray-600 bg-gray-700 text-red-500 focus:ring-red-500 focus:ring-2"
                                value="{{ $transaction->id }}">
                        </td>
                        <td class="p-4 font-medium">{{ $loop->iteration }}</td>
                        <td class="p-4">
                            <div class="flex flex-col">
                                <span class="font-medium">{{ $transaction->created_at->format('d M Y') }}</span>
                                <span class="text-sm text-gray-400">{{ $transaction->created_at->format('H:i') }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    {{ strtoupper(substr($transaction->user->name ?? 'N', 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-medium">{{ $transaction->user->name ?? 'N/A' }}</div>
                                    <div class="text-sm text-gray-400">{{ $transaction->user->email ?? '' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex flex-col space-y-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-700 rounded-lg mr-3 overflow-hidden">
                                        @if($transaction->orderItems->first()?->product?->image_url)
                                        <img src="{{ $transaction->orderItems->first()->product->image_url }}"
                                            class="w-full h-full object-cover"
                                            alt="Product image">
                                        @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-700 to-gray-800">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">{{ $transaction->orderItems->count() }} items</span>
                                        <div class="text-sm text-gray-400">Order #{{ $transaction->id }}</div>
                                    </div>
                                </div>
                                <div class="ml-13">
                                    <button class="text-sm text-red-400 hover:text-red-300 transition-colors"
                                        onclick="toggleProductDetails({{ $transaction->id }})">
                                        <i class="fas fa-eye mr-1"></i>
                                        Lihat Detail
                                    </button>
                                    <div id="products-{{ $transaction->id }}" class="hidden mt-2 pl-4 border-l-2 border-gray-700">
                                        @foreach($transaction->orderItems as $item)
                                        <div class="text-sm text-gray-300 py-1 flex justify-between">
                                            <span>{{ $item->product?->name ?? 'Deleted Product' }}</span>
                                            <span class="text-gray-400">x{{ $item->quantity }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 text-right">
                            <div class="font-bold text-lg">Rp{{ number_format($transaction->total_amount, 0, ',', '.') }}</div>
                            <div class="text-sm text-gray-400">
                                {{ $transaction->orderItems->sum('quantity') }} qty
                            </div>
                        </td>
                        <td class="p-4 text-center">
                            @php
                            $statusColors = [
                            'pending' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                            'completed' => 'bg-green-500/20 text-green-400 border-green-500/30',
                            'failed' => 'bg-red-500/20 text-red-400 border-red-500/30'
                            ];
                            $statusIcons = [
                            'pending' => 'fas fa-clock',
                            'completed' => 'fas fa-check-circle',
                            'failed' => 'fas fa-times-circle'
                            ];
                            @endphp
                            <span class="px-3 py-2 rounded-lg text-sm border {{ $statusColors[$transaction->status] ?? 'bg-gray-500/20 border-gray-500/30' }} flex items-center justify-center gap-2 w-fit mx-auto">
                                <i class="{{ $statusIcons[$transaction->status] ?? 'fas fa-question-circle' }}"></i>
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="red-gradient-hover p-2 rounded-lg glow-red hover:scale-110 transition-transform"
                                    title="Edit Transaksi"
                                    onclick="editTransaction({{ $transaction->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-blue-600/20 text-blue-400 border border-blue-500/30 hover:bg-blue-600/30 p-2 rounded-lg hover:scale-110 transition-all"
                                    title="Lihat Detail"
                                    onclick="viewTransaction({{ $transaction->id }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="bg-red-600/20 text-red-400 border border-red-500/30 hover:bg-red-600/30 p-2 rounded-lg hover:scale-110 transition-all"
                                    title="Hapus Transaksi"
                                    onclick="deleteTransaction({{ $transaction->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bulk Actions -->
        <div id="bulkActions" class="bg-gray-800/50 border-t border-gray-700 p-4 hidden">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-400">
                    <span id="selectedCount">0</span> transaksi dipilih
                </span>
                <div class="flex gap-2">
                    <button class="bg-green-600/20 text-green-400 border border-green-500/30 hover:bg-green-600/30 px-4 py-2 rounded-lg text-sm transition-all">
                        <i class="fas fa-check mr-2"></i>Tandai Selesai
                    </button>
                    <button class="bg-red-600/20 text-red-400 border border-red-500/30 hover:bg-red-600/30 px-4 py-2 rounded-lg text-sm transition-all">
                        <i class="fas fa-trash mr-2"></i>Hapus Terpilih
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $transactions->links() }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchTransactions');
        const statusFilter = document.getElementById('statusFilter');
        const tableRows = document.querySelectorAll('#transactionTable tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            tableRows.forEach(row => {
                const customer = row.dataset.customer;
                const status = row.dataset.status;
                const transactionId = row.dataset.transactionId;

                const matchesSearch = customer.includes(searchTerm) ||
                    transactionId.includes(searchTerm);
                const matchesStatus = !statusValue || status === statusValue;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                    row.classList.add('animate-fadeIn');
                } else {
                    row.style.display = 'none';
                    row.classList.remove('animate-fadeIn');
                }
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);

        // Checkbox functionality
        const selectAllCheckbox = document.getElementById('selectAll');
        const transactionCheckboxes = document.querySelectorAll('.transaction-checkbox');
        const bulkActions = document.getElementById('bulkActions');
        const selectedCount = document.getElementById('selectedCount');

        function updateBulkActions() {
            const checkedBoxes = document.querySelectorAll('.transaction-checkbox:checked');
            selectedCount.textContent = checkedBoxes.length;

            if (checkedBoxes.length > 0) {
                bulkActions.classList.remove('hidden');
            } else {
                bulkActions.classList.add('hidden');
            }
        }

        selectAllCheckbox.addEventListener('change', function() {
            transactionCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActions();
        });

        transactionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActions);
        });

        // Refresh functionality
        document.getElementById('refreshTable').addEventListener('click', function() {
            const icon = this.querySelector('i');
            icon.classList.add('fa-spin');

            setTimeout(() => {
                icon.classList.remove('fa-spin');
                // Add actual refresh logic here
                location.reload();
            }, 1000);
        });
    });

    // Toggle product details
    function toggleProductDetails(transactionId) {
        const details = document.getElementById(`products-${transactionId}`);
        const icon = event.target.querySelector('i');

        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            details.classList.add('animate-slideDown');
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            event.target.innerHTML = '<i class="fas fa-eye-slash mr-1"></i>Sembunyikan';
        } else {
            details.classList.add('hidden');
            details.classList.remove('animate-slideDown');
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            event.target.innerHTML = '<i class="fas fa-eye mr-1"></i>Lihat Detail';
        }
    }

    // Action functions (implement according to your needs)
    function editTransaction(id) {
        console.log('Edit transaction:', id);
        // Implement edit functionality
    }

    function viewTransaction(id) {
        console.log('View transaction:', id);
        // Implement view functionality
    }

    function deleteTransaction(id) {
        if (confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) {
            console.log('Delete transaction:', id);
            // Implement delete functionality
        }
    }
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            max-height: 0;
        }

        to {
            opacity: 1;
            max-height: 200px;
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }

    .animate-slideDown {
        animation: slideDown 0.3s ease-out;
    }

    /* Custom scrollbar */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
        background: #374151;
        border-radius: 3px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #6B7280;
        border-radius: 3px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #9CA3AF;
    }
</style>