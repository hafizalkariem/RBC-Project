@props(['paymentData' => []])

<div class="glass-dark rounded-xl p-6 mb-8">
    <h3 class="text-xl font-bold text-white mb-6">Metode Pembayaran</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Payment Methods Chart -->
        <div>
            <div class="h-64">
                <canvas id="paymentMethodsChart"></canvas>
            </div>
        </div>
        
        <!-- Payment Methods Stats -->
        <div class="space-y-4">
            @php
                $methodColors = [
                    'bank_transfer' => 'bg-blue-500',
                    'credit_card' => 'bg-red-500',
                    'e_wallet' => 'bg-green-500',
                    'qris' => 'bg-purple-500',
                    'other' => 'bg-gray-500'
                ];
                
                $methodIcons = [
                    'bank_transfer' => 'fas fa-university',
                    'credit_card' => 'fas fa-credit-card',
                    'e_wallet' => 'fas fa-wallet',
                    'qris' => 'fas fa-qrcode',
                    'other' => 'fas fa-ellipsis-h'
                ];
            @endphp
            
            @forelse($paymentData as $method => $data)
            <div class="bg-gray-800/30 p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 {{ $methodColors[$method] ?? 'bg-gray-500' }} rounded-lg flex items-center justify-center text-white mr-3">
                            <i class="{{ $methodIcons[$method] ?? 'fas fa-money-bill' }}"></i>
                        </div>
                        <div>
                            <div class="font-medium text-white">{{ ucwords(str_replace('_', ' ', $method)) }}</div>
                            <div class="text-sm text-gray-400">{{ $data['count'] }} transaksi</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-bold text-white">Rp {{ number_format($data['amount'], 0, ',', '.') }}</div>
                        <div class="text-sm text-gray-400">{{ $data['percentage'] }}%</div>
                    </div>
                </div>
                <div class="mt-3 h-2 bg-gray-700 rounded-full overflow-hidden">
                    <div class="h-full {{ $methodColors[$method] ?? 'bg-gray-500' }}" style="width: {{ $data['percentage'] }}%"></div>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-credit-card text-4xl mb-3"></i>
                <p>Belum ada data metode pembayaran</p>
            </div>
            @endforelse
        </div>
    </div>
    
    <div class="mt-6 pt-6 border-t border-gray-700">
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-400">
                <span class="text-white font-medium">{{ array_sum(array_column($paymentData, 'count')) }}</span> total transaksi
            </div>
            <div class="text-sm text-gray-400">
                <span class="text-white font-medium">Rp {{ number_format(array_sum(array_column($paymentData, 'amount')), 0, ',', '.') }}</span> total pendapatan
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Payment Methods Chart
        const ctx = document.getElementById('paymentMethodsChart').getContext('2d');
        
        // Sample data - replace with actual data from backend
        const paymentData = @json($paymentData);
        const labels = Object.keys(paymentData).map(key => ucwords(key.replace('_', ' ')));
        const values = Object.values(paymentData).map(data => data.percentage);
        const backgroundColors = [
            'rgba(59, 130, 246, 0.8)',  // blue
            'rgba(239, 68, 68, 0.8)',   // red
            'rgba(16, 185, 129, 0.8)',  // green
            'rgba(139, 92, 246, 0.8)',  // purple
            'rgba(107, 114, 128, 0.8)'  // gray
        ];
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: backgroundColors,
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: 'rgba(255, 255, 255, 0.7)',
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            },
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.9)',
                        bodyColor: 'rgba(255, 255, 255, 0.7)',
                        bodyFont: {
                            family: "'Inter', sans-serif",
                            size: 12
                        },
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value}%`;
                            }
                        }
                    }
                }
            }
        });
        
        // Helper function to capitalize words
        function ucwords(str) {
            return str.replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
        }
    });
</script>