@extends('layouts.app')

@section('fullwidth')
<!-- Hero Section -->
<x-developer.developer-hero-section :developer="$developer" />

<!-- Stats Section -->
<x-developer.stats-section :developer="$developer" />

<!-- Skills Section -->
<x-developer.skills :developer="$developer" />

<!-- Experience Timeline -->
<x-developer.experience :developer="$developer" />
<!-- Achievements & Certifications -->
<x-developer.achievment :developer="$developer" />

<!-- Portfolio Section -->
<section class="py-16 bg-transparent">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-white mb-12">My Products</h2>
        @if($developer->products && $developer->products->count() > 0)
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($developer->products as $product)
            <div class="glass-card rounded-2xl overflow-hidden hover:scale-105 transition-all duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold text-white">{{ $product->name }}</h3>
                        @if($product->status)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                            @if($product->status == 'hot') bg-green-500/20 text-green-400
                            @elseif($product->status == 'premium') bg-purple-500/20 text-purple-400
                            @elseif($product->status == 'best') bg-pink-500/20 text-pink-400
                            @else bg-blue-500/20 text-blue-400 @endif">
                            {{ ucfirst($product->status) }}
                        </span>
                        @endif
                    </div>
                    <p class="text-white/70 mb-4">{{ $product->description }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($product->technologies as $tech)
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-xs flex items-center gap-1">
                            @if($tech->logo_url)
                            <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="w-3 h-3">
                            @endif
                            {{ $tech->name }}
                        </span>
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-white/50 text-sm">{{ $product->category->name ?? 'Uncategorized' }}</div>
                        <div class="text-blue-400 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="glass-card rounded-3xl p-8 max-w-md mx-auto">
                <i class="fas fa-code text-4xl text-white/50 mb-4"></i>
                <h3 class="text-xl font-bold text-white mb-2">No Products Yet</h3>
                <p class="text-white/70">This developer hasn't created any products yet.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Testimonials for Developer -->
<section class="py-16 bg-transparent">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-white mb-12">Client Testimonials</h2>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center gap-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face" alt="Client" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="text-white font-semibold">John Smith</h4>
                        <p class="text-white/60 text-sm">CEO, TechCorp</p>
                    </div>
                </div>
                <p class="text-white/80 italic">"{{ $developer->name }} delivered exceptional work on our e-commerce platform. Professional, timely, and innovative solutions."</p>
                <div class="flex gap-1 mt-3">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        @endfor
                </div>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center gap-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b332c2b1?w=60&h=60&fit=crop&crop=face" alt="Client" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="text-white font-semibold">Sarah Johnson</h4>
                        <p class="text-white/60 text-sm">Founder, StartupXYZ</p>
                    </div>
                </div>
                <p class="text-white/80 italic">"Amazing developer! {{ $developer->name }} understood our vision perfectly and created exactly what we needed. Highly recommended!"</p>
                <div class="flex gap-1 mt-3">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        @endfor
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-6">Let's Work Together</h2>
                <p class="text-white/80 mb-8">Ready to start your next project? Get in touch and let's create something amazing together.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Contact Info -->
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold">Email</h3>
                            <p class="text-white/70">contact@rbc.co.id</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold">Response Time</h3>
                            <p class="text-white/70">Usually within 24 hours</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-globe text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold">Availability</h3>
                            <p class="text-white/70">Open for new projects</p>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="flex gap-4 pt-4">
                        @if($developer->linkedin_url)
                        <a href="{{ $developer->linkedin_url }}" target="_blank" class="glass p-3 rounded-lg hover:bg-blue-500/20 transition-all duration-300">
                            <i class="fab fa-linkedin text-white text-xl"></i>
                        </a>
                        @endif
                        @if($developer->github_url)
                        <a href="{{ $developer->github_url }}" target="_blank" class="glass p-3 rounded-lg hover:bg-gray-500/20 transition-all duration-300">
                            <i class="fab fa-github text-white text-xl"></i>
                        </a>
                        @endif
                        @if($developer->portfolio_url)
                        <a href="{{ $developer->portfolio_url }}" target="_blank" class="glass p-3 rounded-lg hover:bg-purple-500/20 transition-all duration-300">
                            <i class="fas fa-globe text-white text-xl"></i>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="space-y-4">
                    <a href="mailto:contact@rbc.co.id?subject=Project Inquiry for {{ $developer->name }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-4 rounded-xl text-white font-semibold text-center hover:from-blue-600 hover:to-purple-700 transition-all duration-300">
                        <i class="fas fa-envelope mr-2"></i>Send Email
                    </a>

                    @if($developer->linkedin_url)
                    <a href="{{ $developer->linkedin_url }}" target="_blank" class="block w-full glass px-8 py-4 rounded-xl text-white font-semibold text-center hover:bg-white/20 transition-all duration-300">
                        <i class="fab fa-linkedin mr-2"></i>Connect on LinkedIn
                    </a>
                    @endif

                    <a href="{{ route('service') }}" class="block w-full glass px-8 py-4 rounded-xl text-white font-semibold text-center hover:bg-white/20 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>View All Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection