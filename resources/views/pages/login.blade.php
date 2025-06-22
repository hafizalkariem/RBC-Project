@extends('layouts.app')

@section('fullwidth')
<section class="min-h-screen flex items-center justify-center py-12 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <div class="glass-card rounded-3xl p-8 border border-white/20">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                    <p class="text-white/70">Sign in to your RBC account</p>
                </div>

                @if($errors->any())
                <div class="bg-red-500/20 border border-red-500/50 rounded-lg p-4 mb-6">
                    <ul class="text-red-300 text-sm">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="bg-green-500/20 border border-green-500/50 rounded-lg p-4 mb-6">
                    <p class="text-green-300 text-sm">{{ session('success') }}</p>
                </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-white font-medium mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                               class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                               placeholder="Enter your email">
                    </div>

                    <div>
                        <label class="block text-white font-medium mb-2">Password</label>
                        <input type="password" name="password" required 
                               class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                               placeholder="Enter your password">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-white/20 text-blue-500 focus:ring-blue-400/50">
                            <span class="ml-2 text-white/70 text-sm">Remember me</span>
                        </label>
                        <a href="#" class="text-blue-400 hover:text-blue-300 text-sm">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 py-3 rounded-lg text-white font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                        Sign In
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-white/70">Don't have an account? 
                        <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold">Sign up</a>
                    </p>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-white/60 hover:text-white text-sm">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection