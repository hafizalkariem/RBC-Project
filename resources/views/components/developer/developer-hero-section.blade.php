<section class="py-20 md:py-28 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden border-4 border-blue-500/30">
                <img src="{{ $developer->photo_url }}" alt="{{ $developer->name }}" class="w-full h-full object-cover">
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">{{ $developer->name }}</h1>
            <p class="text-xl text-blue-400 mb-6">{{ $developer->role }}</p>
            <p class="text-lg text-white/80 max-w-2xl mx-auto mb-8">{{ $developer->description }}</p>

            <!-- Social Links -->
            <div class="flex justify-center gap-4 mb-8">
                @if($developer->github_url)
                <a href="{{ $developer->github_url }}" target="_blank" class="glass p-3 rounded-lg hover:bg-blue-500/20 transition-all duration-300">
                    <i class="fab fa-github text-white text-xl"></i>
                </a>
                @endif
                @if($developer->linkedin_url)
                <a href="{{ $developer->linkedin_url }}" target="_blank" class="glass p-3 rounded-lg hover:bg-blue-500/20 transition-all duration-300">
                    <i class="fab fa-linkedin text-white text-xl"></i>
                </a>
                @endif
                @if($developer->portfolio_url)
                <a href="{{ $developer->portfolio_url }}" target="_blank" class="glass p-3 rounded-lg hover:bg-blue-500/20 transition-all duration-300">
                    <i class="fas fa-globe text-white text-xl"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>