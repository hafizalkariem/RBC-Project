@extends('layouts.app')

@section('fullwidth')
<section class="min-h-screen flex items-center justify-center py-12 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="glass-card rounded-3xl p-8 border border-white/20">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-white mb-2">Join RBC</h1>
                    <p class="text-white/70">Create your account and start your digital journey</p>
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

                <form method="POST" action="{{ route('register.submit') }}" class="space-y-6">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-medium mb-2">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="Enter your full name">
                        </div>

                        <div>
                            <label class="block text-white font-medium mb-2">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-medium mb-2">Password *</label>
                            <input type="password" name="password" required 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="Create password (min 8 characters)">
                        </div>

                        <div>
                            <label class="block text-white font-medium mb-2">Confirm Password *</label>
                            <input type="password" name="password_confirmation" required 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="Confirm your password">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-medium mb-2">Phone Number</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}" 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="+62 812-3456-7890">
                        </div>

                        <div>
                            <label class="block text-white font-medium mb-2">Company</label>
                            <input type="text" name="client_company" value="{{ old('client_company') }}" 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="Your company name">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-medium mb-2">Job Role</label>
                            <input type="text" name="client_role" value="{{ old('client_role') }}" 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="e.g. CEO, Developer, Manager">
                        </div>

                        <div>
                            <label class="block text-white font-medium mb-2">Address</label>
                            <input type="text" name="address" value="{{ old('address') }}" 
                                   class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 border border-white/20" 
                                   placeholder="Your address">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" required class="rounded border-white/20 text-blue-500 focus:ring-blue-400/50">
                        <span class="ml-2 text-white/70 text-sm">I agree to the <a href="#" class="text-blue-400 hover:text-blue-300">Terms of Service</a> and <a href="#" class="text-blue-400 hover:text-blue-300">Privacy Policy</a></span>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 py-3 rounded-lg text-white font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                        Create Account
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-white/70">Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-semibold">Sign in</a>
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