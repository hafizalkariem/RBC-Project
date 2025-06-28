@props(['chartData' => null])

<div class="glass-dark rounded-xl p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-white">Grafik Transaksi</h3>
        <div class="flex space-x-3">
            <select id="chartPeriod" class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option value="7">7 Hari Terakhir</option>
                <option value="30" selected>30 Hari Terakhir</option>
                <option value="90">3 Bulan Terakhir</option>
                <option value="365">1 Tahun</option>
            </select>
            <div class="flex space-x-2">
                <button class="bg-red-500 text-white px-3 py-2 rounded-lg text-sm transition-colors" data-chart-type="line">
                    <i class="fas fa-chart-line"></i>
                </button>
                <button class="bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-lg text-sm transition-colors" data-chart-type="bar">
                    <i class="fas fa-chart-bar"></i>
                </button>
            </div>
        </div>
    </div>
    
    <div class="h-80 relative">
        <div id="chartLoading" class="absolute inset-0 flex items-center justify-center bg-gray-900/50 rounded-lg hidden">
            <div class="text-center text-gray-400">
                <i class="fas fa-spinner fa-spin text-4xl mb-3"></i>
                <p>Loading chart data...</p>
            </div>
        </div>
        <canvas id="transactionChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart configuration
        const ctx = document.getElementById('transactionChart').getContext('2d');
        
        // Initial data from backend
        const initialLabels = @json($chartData['labels'] ?? []);
        const initialRevenue = @json($chartData['revenue'] ?? []);
        const initialTransactions = @json($chartData['transactions'] ?? []);
        
        // Create gradients
        function createGradients() {
            const revenueGradient = ctx.createLinearGradient(0, 0, 0, 400);
            revenueGradient.addColorStop(0, 'rgba(239, 68, 68, 0.6)');
            revenueGradient.addColorStop(1, 'rgba(239, 68, 68, 0.1)');
            
            const transactionGradient = ctx.createLinearGradient(0, 0, 0, 400);
            transactionGradient.addColorStop(0, 'rgba(59, 130, 246, 0.6)');
            transactionGradient.addColorStop(1, 'rgba(59, 130, 246, 0.1)');
            
            return { revenueGradient, transactionGradient };
        }
        
        const { revenueGradient, transactionGradient } = createGradients();
        
        // Chart instance
        let chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: initialLabels,
                datasets: [
                    {
                        label: 'Pendapatan (Rp)',
                        data: initialRevenue,
                        backgroundColor: revenueGradient,
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(239, 68, 68, 1)',
                        pointBorderColor: '#fff',
                        pointRadius: 4,
                        tension: 0.4,
                        fill: true,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Jumlah Transaksi',
                        data: initialTransactions,
                        backgroundColor: transactionGradient,
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                        pointBorderColor: '#fff',
                        pointRadius: 4,
                        tension: 0.4,
                        fill: true,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'rgba(255, 255, 255, 0.7)',
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.9)',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        padding: 12,
                        titleColor: 'rgba(255, 255, 255, 0.9)',
                        bodyColor: 'rgba(255, 255, 255, 0.7)',
                        bodyFont: {
                            family: "'Inter', sans-serif",
                            size: 12
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.datasetIndex === 0) {
                                    label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.parsed.y);
                                } else {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.05)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)'
                        }
                    },
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        grid: {
                            color: 'rgba(255, 255, 255, 0.05)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)',
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                            }
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)'
                        }
                    }
                }
            }
        });
        
        // Function to update chart data
        function updateChart(newData) {
            const { revenueGradient, transactionGradient } = createGradients();
            
            chartInstance.data.labels = newData.labels;
            chartInstance.data.datasets[0].data = newData.revenue;
            chartInstance.data.datasets[0].backgroundColor = revenueGradient;
            chartInstance.data.datasets[1].data = newData.transactions;
            chartInstance.data.datasets[1].backgroundColor = transactionGradient;
            chartInstance.update();
        }
        
        // Chart type toggle
        document.querySelectorAll('[data-chart-type]').forEach(button => {
            button.addEventListener('click', function() {
                const chartType = this.getAttribute('data-chart-type');
                chartInstance.config.type = chartType;
                chartInstance.update();
                
                // Update active button
                document.querySelectorAll('[data-chart-type]').forEach(btn => {
                    btn.classList.remove('bg-red-500', 'text-white');
                    btn.classList.add('bg-gray-800', 'hover:bg-gray-700');
                });
                this.classList.remove('bg-gray-800', 'hover:bg-gray-700');
                this.classList.add('bg-red-500', 'text-white');
            });
        });
        
        // Period change with AJAX
        document.getElementById('chartPeriod').addEventListener('change', function() {
            const period = this.value;
            const loadingDiv = document.getElementById('chartLoading');
            
            // Show loading
            loadingDiv.classList.remove('hidden');
            
            // Fetch new data
            fetch(`{{ route('admin.transactions.index') }}?type=chart&chart_period=${period}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update chart with new data
                updateChart(data.chartData);
                
                // Hide loading
                loadingDiv.classList.add('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Hide loading and show error
                loadingDiv.innerHTML = `
                    <div class="text-center text-red-400">
                        <i class="fas fa-exclamation-triangle text-4xl mb-3"></i>
                        <p>Failed to load chart data</p>
                    </div>
                `;
                
                setTimeout(() => {
                    loadingDiv.classList.add('hidden');
                    loadingDiv.innerHTML = `
                        <div class="text-center text-gray-400">
                            <i class="fas fa-spinner fa-spin text-4xl mb-3"></i>
                            <p>Loading chart data...</p>
                        </div>
                    `;
                }, 3000);
            });
        });
    });
</script>