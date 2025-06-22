@extends('layouts.app')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 pt-20">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="glass rounded-2xl p-8 mb-8">
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                <div class="relative">
                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3b82f6&color=fff&size=150' }}"
                        alt="Profile" class="w-32 h-32 rounded-full border-4 border-blue-500/50 object-cover">
                    <div class="absolute -bottom-2 -right-2 bg-green-500 w-8 h-8 rounded-full border-4 border-slate-900"></div>
                </div>

                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-3xl font-bold text-white mb-2">{{ Auth::user()->name }}</h1>
                    <p class="text-gray-300 mb-4">{{ Auth::user()->email }}</p>
                    <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm">Member</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm">Active</span>
                    </div>
                </div>

                <a href="{{ route('profile.edit') }}" class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-2 rounded-lg text-white hover:from-blue-600 hover:to-purple-700 transition-all duration-300">
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Profile Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-blue-400 mb-2">0</div>
                <div class="text-gray-300">Orders</div>
            </div>
            <div class="glass rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-purple-400 mb-2">0</div>
                <div class="text-gray-300">Projects</div>
            </div>
            <div class="glass rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-green-400 mb-2">{{ Auth::user()->created_at->diffForHumans() }}</div>
                <div class="text-gray-300">Member Since</div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="glass rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Profile Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 mb-2">Full Name</label>
                    <div class="glass p-3 rounded-lg text-white">{{ Auth::user()->name }}</div>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Email Address</label>
                    <div class="glass p-3 rounded-lg text-white">{{ Auth::user()->email }}</div>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Phone Number</label>
                    <div class="glass p-3 rounded-lg {{ Auth::user()->phone_number ? 'text-white' : 'text-gray-400' }}">{{ Auth::user()->phone_number ?: 'Not provided' }}</div>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Location</label>
                    <div class="glass p-3 rounded-lg {{ Auth::user()->address ? 'text-white' : 'text-gray-400' }}">{{ Auth::user()->address ?: 'Not provided' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection