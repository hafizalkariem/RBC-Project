<div class="glass-dark rounded-xl p-6 mt-8 hover-lift" data-aos="fade-up">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold gradient-text mb-1">Product Analytics</h3>
            <p class="text-gray-400 text-sm">Distribution by categories</p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Pie Chart -->
        <div class="relative bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50 rounded-xl p-6" data-aos="zoom-in" data-aos-delay="100">
            <h4 class="text-lg font-semibold text-white mb-4">Products by Category</h4>
            <div class="flex justify-center">
                <canvas id="categoryPieChart" width="300" height="300"></canvas>
            </div>
        </div>
        
        <!-- Category Legend -->
        <div class="relative bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50 rounded-xl p-6" data-aos="zoom-in" data-aos-delay="200">
            <h4 class="text-lg font-semibold text-white mb-4">Category Details</h4>
            <div class="space-y-3" id="categoryLegend">
                @foreach($categories as $index => $category)
                <div class="flex items-center justify-between p-3 bg-slate-700/30 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-4 h-4 rounded-full" style="background-color: {{ ['#ef4444', '#06b6d4', '#8b5cf6', '#f59e0b', '#10b981', '#f97316', '#ec4899', '#6366f1'][$index % 8] }}"></div>
                        <div>
                            <div class="text-white font-medium">{{ $category->name }}</div>
                            <div class="text-gray-400 text-sm">{{ $category->products_count }} products</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-white font-bold">{{ $category->products_count > 0 ? round(($category->products_count / $allProducts->count()) * 100, 1) : 0 }}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Technology Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Bar Chart for Top Technologies -->
        <div class="relative bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50 rounded-xl p-6" data-aos="zoom-in" data-aos-delay="300">
            <h4 class="text-lg font-semibold text-white mb-4">Top 5 Technologies</h4>
            <div class="flex justify-center">
                <canvas id="technologyBarChart" width="400" height="300"></canvas>
            </div>
        </div>
        
        <!-- Technology Details -->
        <div class="relative bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50 rounded-xl p-6" data-aos="zoom-in" data-aos-delay="400">
            <h4 class="text-lg font-semibold text-white mb-4">Technology Usage</h4>
            <div class="space-y-3" id="technologyList">
                @php
                    $techUsage = $technologies->map(function($tech) use ($allProducts) {
                        $count = $allProducts->filter(function($product) use ($tech) {
                            return $product->technologies->contains('id', $tech->id);
                        })->count();
                        return ['tech' => $tech, 'count' => $count];
                    })->sortByDesc('count')->take(5);
                @endphp
                @foreach($techUsage as $index => $item)
                <div class="flex items-center justify-between p-3 bg-slate-700/30 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $item['tech']->logo_url }}" alt="{{ $item['tech']->name }}" class="w-6 h-6">
                        <div>
                            <div class="text-white font-medium">{{ $item['tech']->name }}</div>
                            <div class="text-gray-400 text-sm">{{ $item['count'] }} products</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-white font-bold">{{ $item['count'] > 0 ? round(($item['count'] / $allProducts->count()) * 100, 1) : 0 }}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Pie Chart for Categories
    const categoryData = @json($categories->map(function($category) {
        return [
            'name' => $category->name,
            'count' => $category->products_count
        ];
    }));
    
    const colors = ['#ef4444', '#06b6d4', '#8b5cf6', '#f59e0b', '#10b981', '#f97316', '#ec4899', '#6366f1'];
    
    const ctx = document.getElementById('categoryPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categoryData.map(item => item.name),
            datasets: [{
                data: categoryData.map(item => item.count),
                backgroundColor: colors.slice(0, categoryData.length),
                borderColor: colors.slice(0, categoryData.length).map(color => color + '80'),
                borderWidth: 2,
                hoverBorderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#374151',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            },
            cutout: '60%',
            animation: {
                animateRotate: true,
                duration: 2000
            }
        }
    });
    
    // Bar Chart for Top Technologies
    const technologyData = @json($technologies->map(function($tech) use ($allProducts) {
        $count = $allProducts->filter(function($product) use ($tech) {
            return $product->technologies->contains('id', $tech->id);
        })->count();
        return [
            'name' => $tech->name,
            'count' => $count
        ];
    })->sortByDesc('count')->take(5)->values());
    
    const techCtx = document.getElementById('technologyBarChart').getContext('2d');
    new Chart(techCtx, {
        type: 'bar',
        data: {
            labels: technologyData.map(item => item.name),
            datasets: [{
                label: 'Products',
                data: technologyData.map(item => item.count),
                backgroundColor: colors.slice(0, technologyData.length),
                borderColor: colors.slice(0, technologyData.length),
                borderWidth: 1,
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#374151',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#9ca3af',
                        stepSize: 1
                    },
                    grid: {
                        color: '#374151'
                    }
                },
                x: {
                    ticks: {
                        color: '#9ca3af'
                    },
                    grid: {
                        color: '#374151'
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });
});
</script>