<style>
@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(239, 68, 68, 0.4); }
    50% { box-shadow: 0 0 30px rgba(239, 68, 68, 0.8); }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

.stats-card {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: countUp 0.6s ease-out;
}

.stats-card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(239, 68, 68, 0.2);
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
    transition: left 0.5s;
}

.stats-card:hover::before {
    left: 100%;
}

.icon-float {
    animation: float 3s ease-in-out infinite;
}

.number-glow {
    text-shadow: 0 0 10px rgba(239, 68, 68, 0.5);
}

.progress-bar {
    height: 4px;
    background: rgba(239, 68, 68, 0.2);
    border-radius: 2px;
    overflow: hidden;
    margin-top: 8px;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #dc2626, #ef4444, #f87171);
    border-radius: 2px;
    animation: shimmer 2s infinite;
    background-size: 200% 100%;
}
</style>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users Card -->
    <div class="stats-card glass-dark p-6 rounded-xl border border-red-500/20" style="animation-delay: 0.1s">
        <div class="flex items-center justify-between mb-4">
            <div class="flex-1">
                <p class="text-gray-400 text-sm font-medium mb-1">Total Users</p>
                <p class="text-3xl font-bold text-white number-glow" x-data="{ count: 0 }" x-init="setTimeout(() => { let target = 1234; let increment = target / 50; let timer = setInterval(() => { count += increment; if (count >= target) { count = target; clearInterval(timer); } }, 30); }, 200)">{{ $stats['users'] ?? 0 }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-green-400 text-xs font-medium">↗ +12%</span>
                    <span class="text-gray-500 text-xs ml-2">vs last month</span>
                </div>
            </div>
            <div class="w-14 h-14 red-gradient rounded-full flex items-center justify-center glow-red icon-float" style="animation-delay: 0.5s">
                <i class="fas fa-users text-white text-lg"></i>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 78%;"></div>
        </div>
    </div>

    <!-- Products Card -->
    <div class="stats-card glass-dark p-6 rounded-xl border border-red-500/20" style="animation-delay: 0.2s">
        <div class="flex items-center justify-between mb-4">
            <div class="flex-1">
                <p class="text-gray-400 text-sm font-medium mb-1">Products</p>
                <p class="text-3xl font-bold text-white number-glow">{{ $stats['products'] ?? 0 }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-green-400 text-xs font-medium">↗ +8%</span>
                    <span class="text-gray-500 text-xs ml-2">vs last month</span>
                </div>
            </div>
            <div class="w-14 h-14 red-gradient rounded-full flex items-center justify-center glow-red icon-float" style="animation-delay: 0.7s">
                <i class="fas fa-box text-white text-lg"></i>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 65%;"></div>
        </div>
    </div>

    <!-- Orders Card -->
    <div class="stats-card glass-dark p-6 rounded-xl border border-red-500/20" style="animation-delay: 0.3s">
        <div class="flex items-center justify-between mb-4">
            <div class="flex-1">
                <p class="text-gray-400 text-sm font-medium mb-1">Orders</p>
                <p class="text-3xl font-bold text-white number-glow">{{ $stats['orders'] ?? 0 }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-green-400 text-xs font-medium">↗ +24%</span>
                    <span class="text-gray-500 text-xs ml-2">vs last month</span>
                </div>
            </div>
            <div class="w-14 h-14 red-gradient rounded-full flex items-center justify-center glow-red icon-float" style="animation-delay: 0.9s">
                <i class="fas fa-shopping-cart text-white text-lg"></i>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 92%;"></div>
        </div>
    </div>

    <!-- Revenue Card -->
    <div class="stats-card glass-dark p-6 rounded-xl border border-red-500/20" style="animation-delay: 0.4s">
        <div class="flex items-center justify-between mb-4">
            <div class="flex-1">
                <p class="text-gray-400 text-sm font-medium mb-1">Revenue</p>
                <p class="text-3xl font-bold text-white number-glow">${{ number_format($stats['revenue'] ?? 0) }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-green-400 text-xs font-medium">↗ +18%</span>
                    <span class="text-gray-500 text-xs ml-2">vs last month</span>
                </div>
            </div>
            <div class="w-14 h-14 red-gradient rounded-full flex items-center justify-center glow-red icon-float" style="animation-delay: 1.1s">
                <i class="fas fa-dollar-sign text-white text-lg"></i>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 85%;"></div>
        </div>
    </div>
</div>