{{-- resources/views/components/admin/transaction-stats.blade.php --}}
@props(['stats' => null])

@php
$statsData = $stats ?? [];
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @foreach($statsData as $stat)
    <div class="glass-dark rounded-xl p-6 animated-bg hover:glow-red-strong transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm font-medium">{{ $stat['title'] }}</p>
                <p class="text-3xl font-bold text-white mt-2">{{ $stat['value'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-{{ $stat['trendUp'] ? 'green' : 'red' }}-400 text-sm font-medium">
                        <i class="fas fa-arrow-{{ $stat['trendUp'] ? 'up' : 'down' }} mr-1"></i>
                        {{ $stat['trend'] }}
                    </span>
                    <span class="text-gray-500 text-sm ml-2">dari bulan lalu</span>
                </div>
            </div>
            <div class="w-16 h-16 red-gradient rounded-full flex items-center justify-center glow-red">
                <i class="{{ $stat['icon'] }} text-white text-2xl"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>