@props(['topCustomers' => [], 'customerStats' => []])

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Top Customers -->
    <div class="glass-dark rounded-xl p-6 col-span-1">
        <h3 class="text-xl font-bold text-white mb-4">Top Pelanggan</h3>
        <div class="space-y-4">
            @forelse($topCustomers as $customer)
            <div class="flex items-center justify-between p-3 bg-gray-800/30 rounded-lg hover:bg-gray-800/50 transition-all">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                        {{ strtoupper(substr($customer['name'] ?? 'N', 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-white">{{ $customer['name'] }}</div>
                        <div class="text-sm text-gray-400">{{ $customer['email'] }}</div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-white">Rp {{ number_format($customer['total_spent'], 0, ',', '.') }}</div>
                    <div class="text-sm text-gray-400">{{ $customer['orders_count'] }} transaksi</div>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-users text-4xl mb-3"></i>
                <p>Belum ada data pelanggan</p>
            </div>
            @endforelse
        </div>
        
        @if(count($topCustomers) > 0)
        <div class="mt-4 text-center">
            <button class="text-red-400 hover:text-red-300 text-sm transition-colors">
                Lihat Semua Pelanggan <i class="fas fa-arrow-right ml-1"></i>
            </button>
        </div>
        @endif
    </div>
    
    <!-- Customer Retention -->
    <div class="glass-dark rounded-xl p-6 col-span-1">
        <h3 class="text-xl font-bold text-white mb-4">Retensi Pelanggan</h3>
        <div class="flex items-center justify-center h-48">
            <div class="w-48 h-48 relative">
                <canvas id="retentionChart"></canvas>
                <div class="absolute inset-0 flex items-center justify-center flex-col">
                    <span class="text-3xl font-bold text-white">{{ $customerStats['retention_rate'] ?? '75' }}%</span>
                    <span class="text-sm text-gray-400">Retensi</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="bg-gray-800/30 p-3 rounded-lg text-center">
                <div class="text-lg font-bold text-white">{{ $customerStats['returning_customers'] ?? '45' }}</div>
                <div class="text-sm text-gray-400">Pelanggan Kembali</div>
            </div>
            <div class="bg-gray-800/30 p-3 rounded-lg text-center">
                <div class="text-lg font-bold text-white">{{ $customerStats['new_customers'] ?? '15' }}</div>
                <div class="text-sm text-gray-400">Pelanggan Baru</div>
            </div>
        </div>
    </div>
    
    <!-- Customer Acquisition -->
    <div class="glass-dark rounded-xl p-6 col-span-1">
        <h3 class="text-xl font-bold text-white mb-4">Akuisisi Pelanggan</h3>
        <div class="space-y-4">
            <div class="bg-gray-800/30 p-4 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-400">Organik</span>
                    <span class="text-white font-medium">{{ $customerStats['organic_acquisition'] ?? '65' }}%</span>
                </div>
                <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                    <div class="h-full bg-green-500" style="width: {{ $customerStats['organic_acquisition'] ?? '65' }}%"></div>
                </div>
            </div>
            
            <div class="bg-gray-800/30 p-4 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-400">Referral</span>
                    <span class="text-white font-medium">{{ $customerStats['referral_acquisition'] ?? '20' }}%</span>
                </div>
                <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-500" style="width: {{ $customerStats['referral_acquisition'] ?? '20' }}%"></div>
                </div>
            </div>
            
            <div class="bg-gray-800/30 p-4 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-400">Sosial Media</span>
                    <span class="text-white font-medium">{{ $customerStats['social_acquisition'] ?? '15' }}%</span>
                </div>
                <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                    <div class="h-full bg-purple-500" style="width: {{ $customerStats['social_acquisition'] ?? '15' }}%"></div>
                </div>
            </div>
        </div>
        
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-sm text-gray-400">Biaya Akuisisi Rata-rata</div>
                    <div class="text-xl font-bold text-white">Rp {{ number_format($customerStats['avg_acquisition_cost'] ?? 150000, 0, ',', '.') }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-400">Nilai Pelanggan</div>
                    <div class="text-xl font-bold text-white">Rp {{ number_format($customerStats['customer_lifetime_value'] ?? 750000, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Retention Chart
        const ctx = document.getElementById('retentionChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [{{ $customerStats['retention_rate'] ?? '75' }}, {{ 100 - ($customerStats['retention_rate'] ?? 75) }}],
                    backgroundColor: [
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(75, 85, 99, 0.2)'
                    ],
                    borderWidth: 0,
                    cutout: '80%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });
    });
</script>