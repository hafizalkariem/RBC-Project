@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@include('components.admin.stats-card', ['stats' => $stats])

<!-- Recent Activity -->
<div class="glass-dark rounded-xl p-6 mt-8">
    <h2 class="text-xl font-bold text-white mb-4">Recent Activity</h2>
    <div class="space-y-4">
        <div class="flex items-center justify-between py-3 border-b border-gray-700">
            <div class="flex items-center">
                <div class="w-10 h-10 red-gradient rounded-full flex items-center justify-center glow-red">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div class="ml-3">
                    <p class="text-white">New user registered</p>
                    <p class="text-gray-400 text-sm">2 minutes ago</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between py-3 border-b border-gray-700">
            <div class="flex items-center">
                <div class="w-10 h-10 red-gradient rounded-full flex items-center justify-center glow-red">
                    <i class="fas fa-shopping-cart text-white"></i>
                </div>
                <div class="ml-3">
                    <p class="text-white">New order received</p>
                    <p class="text-gray-400 text-sm">5 minutes ago</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection