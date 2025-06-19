<style>
    .tech-card {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.10) 0%, rgba(139, 92, 246, 0.08) 100%);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(59, 130, 246, 0.18);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .tech-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(59, 130, 246, 0.10);
        border-color: rgba(139, 92, 246, 0.25);
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.10), transparent);
        transition: left 0.6s;
    }

    .tech-card:hover::before {
        left: 100%;
    }

    .tech-logo {
        transition: all 0.3s ease;
        filter: drop-shadow(0 4px 8px rgba(59, 130, 246, 0.10));
    }

    .tech-card:hover .tech-logo {
        transform: scale(1.1) rotate(5deg);
        filter: drop-shadow(0 8px 16px rgba(59, 130, 246, 0.18));
    }

    .section-bg {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 40%, #06b6d4 80%, #8b5cf6 100%);
        position: relative;
        overflow: hidden;
    }

    .section-glass {
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(18px);
        border-radius: 2rem;
        border: 1px solid rgba(59, 130, 246, 0.10);
        box-shadow: 0 8px 32px 0 rgba(16, 24, 39, 0.15);
    }

    .code-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.03;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='50' font-size='12' fill='white' font-family='monospace'%3E%3C/html%3E %3Cdiv%3E %3Cscript%3E function() %7B %7D %3C/script%3E %3Cstyle%3E body %7B %7D %3C/style%3E%3C/text%3E%3C/svg%3E");
    }

    .floating-code {
        position: absolute;
        animation: float 15s infinite ease-in-out;
        opacity: 0.1;
        font-family: 'Courier New', monospace;
        color: white;
        font-size: 12px;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) translateX(0px);
        }

        25% {
            transform: translateY(-20px) translateX(10px);
        }

        50% {
            transform: translateY(-10px) translateX(-5px);
        }

        75% {
            transform: translateY(-30px) translateX(8px);
        }
    }

    .category-badge {
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.18), rgba(139, 92, 246, 0.10));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.18);
    }

    .pulse-dot {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .expertise-level {
        height: 4px;
        background: linear-gradient(90deg, #06b6d4, #3b82f6, #8b5cf6);
        border-radius: 2px;
        position: relative;
        overflow: hidden;
    }

    .expertise-level::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }

    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-marquee {
        animation: marquee 18s linear infinite;

    }
</style>
<section class="py-16 md:py-24 glass-dark backdrop-blur-xl relative">
    <div class="code-bg"></div>

    <!-- Floating Code Elements -->
    <div class="floating-code" style="top: 10%; left: 5%; animation-delay: 0s;">&lt;?php echo "Hello World"; ?&gt;</div>
    <div class="floating-code" style="top: 20%; right: 10%; animation-delay: 2s;">const app = new Vue({...})</div>
    <div class="floating-code" style="top: 60%; left: 8%; animation-delay: 4s;">SELECT * FROM users WHERE...</div>
    <div class="floating-code" style="bottom: 30%; right: 15%; animation-delay: 6s;">npm install react next.js</div>
    <div class="floating-code" style="bottom: 15%; left: 12%; animation-delay: 8s;">git commit -m "feature"</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-3 mb-6">
                <div class="pulse-dot w-2 h-2 bg-green-400 rounded-full"></div>
                <span class="text-white/90 text-sm font-medium">Teknologi Terdepan</span>
            </div>

            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 bg-clip-text text-transparent">
                    Stack Teknologi
                </span>
                <br />
                <span class="text-white">Yang Kami Kuasai</span>
            </h2>

            <p class="text-white/80 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-8">
                Dari frontend modern hingga backend yang scalable, kami menggunakan teknologi terbaik untuk membangun solusi digital yang powerful dan reliable
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <span class="category-badge rounded-full px-4 py-2 text-white/90 text-sm font-medium">15+ Bahasa Pemrograman</span>
                <span class="category-badge rounded-full px-4 py-2 text-white/90 text-sm font-medium">25+ Framework</span>
                <span class="category-badge rounded-full px-4 py-2 text-white/90 text-sm font-medium">10+ Database</span>
            </div>
        </div>

        <!-- Frontend Technologies -->
        {{-- filepath: resources/views/components/tech-languange.blade.php --}}
        ...
        @foreach($techCategories as $category)
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                {{ $category->icon ?? '' }} {{ $category->name }}
            </h3>
            <div class="hidden sm:grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($category->technologies as $tech)
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 flex items-center justify-center p-3">
                        @if($tech->logo_url)
                        <img src="{{ Str::startsWith($tech->logo_url, ['http', '//']) ? $tech->logo_url : asset($tech->logo_url) }}" alt="{{ $tech->name }}" class="w-full h-full object-contain">
                        @else
                        <i class="fas fa-robot text-white text-2xl"></i>
                        @endif
                    </div>
                    <h4 class="text-white font-semibold mb-2">{{ $tech->name }}</h4>
                    <p class="text-white/70 text-sm mb-3">{{ $tech->description }}</p>
                    <div class="expertise-level"></div>
                </div>
                @endforeach
            </div>
            {{-- Marquee mobile --}}
            <div class="block sm:hidden overflow-hidden whitespace-nowrap py-2">
                <div class="inline-flex animate-marquee gap-4">
                    @foreach($category->technologies as $tech)
                    <div class="tech-card w-48 inline-block p-4 text-center group rounded-2xl">
                        <div class="tech-logo w-12 h-12 mx-auto mb-2 flex items-center justify-center p-2">
                            @if($tech->logo_url)
                            <img src="{{ Str::startsWith($tech->logo_url, ['http', '//']) ? $tech->logo_url : asset($tech->logo_url) }}" alt="{{ $tech->name }}" class="w-full h-full object-contain">
                            @else
                            <i class="fas fa-robot text-white text-2xl"></i>
                            @endif
                        </div>
                        <h4 class="text-white font-semibold text-base mb-1">{{ $tech->name }}</h4>
                        <p class="text-white/70 text-sm mb-3">{{ $tech->description }}</p>
                        <div class="expertise-level"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        ...
    </div>
</section>