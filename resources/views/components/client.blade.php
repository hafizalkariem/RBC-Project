<style>
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 30s linear infinite;
    }

    .animate-scroll:hover {
        animation-play-state: paused;
    }

    .client-logo {
        transition: all 0.3s ease;
        filter: grayscale(100%) brightness(0.8);
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    }

    .client-logo:hover {
        filter: grayscale(0%) brightness(1) drop-shadow(0 10px 25px rgba(59, 130, 246, 0.15));
        transform: translateY(-2px) scale(1.05);
    }

    .trust-badge {
        background: rgba(30, 58, 138, 0.15);
        /* biru tua transparan */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.15);
        /* biru */
    }

    .section-bg {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #8b5cf6 100%);
        position: relative;
        overflow: hidden;
    }

    .section-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b82f6' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        opacity: 0.25;
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .floating-elements::before,
    .floating-elements::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.10) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 20s infinite ease-in-out;
    }

    .floating-elements::before {
        top: -100px;
        left: -100px;
        animation-delay: 0s;
    }

    .floating-elements::after {
        bottom: -100px;
        right: -100px;
        animation-delay: 10s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    .stats-counter {
        font-variant-numeric: tabular-nums;
    }
</style>


<section class="py-16 md:py-24 relative">
    <div class="floating-elements"></div>

    <!-- Header Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-blue-500/20 rounded-full px-4 py-2 mb-6">
                <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-white/90 text-sm font-medium">Terpercaya & Berpengalaman</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                Telah Dipercaya Oleh
                <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-purple-400 bg-clip-text text-transparent">
                    500+ Klien
                </span>
            </h2>
            <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Dari startup hingga perusahaan multinasional, kami bangga melayani klien terbaik di berbagai industri
            </p>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
            <div class="trust-badge rounded-2xl p-6 text-center">
                <div class="stats-counter text-3xl md:text-4xl font-bold text-blue-300 mb-2" data-target="500">0+</div>
                <div class="text-white/70 text-sm">Klien Aktif</div>
            </div>
            <div class="trust-badge rounded-2xl p-6 text-center">
                <div class="stats-counter text-3xl md:text-4xl font-bold text-cyan-300 mb-2" data-target="98">0%</div>
                <div class="text-white/70 text-sm">Tingkat Kepuasan</div>
            </div>
            <div class="trust-badge rounded-2xl p-6 text-center">
                <div class="stats-counter text-3xl md:text-4xl font-bold text-purple-300 mb-2" data-target="1000">0+</div>
                <div class="text-white/70 text-sm">Proyek Selesai</div>
            </div>
            <div class="trust-badge rounded-2xl p-6 text-center">
                <div class="stats-counter text-3xl md:text-4xl font-bold text-blue-200 mb-2" data-target="5">0+</div>
                <div class="text-white/70 text-sm">Tahun Pengalaman</div>
            </div>
        </div>

    </div>

    <!-- Client Logos Marquee -->
    <div class="relative w-full overflow-hidden">
        <div class="flex animate-scroll gap-12 md:gap-16">
            <!-- Set 1 -->
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 1</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 2</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 3</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 4</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 5</span>
                </div>
            </div>

            <!-- Set 2 (Duplicate for seamless loop) -->
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 1</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 2</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 3</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 4</span>
                </div>
            </div>
            <div class="flex-shrink-0 trust-badge rounded-2xl p-6 md:p-8">
                <div class="client-logo h-16 md:h-20 w-32 md:w-40 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">CLIENT 5</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom CTA -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 relative z-10">
        <div class="trust-badge rounded-3xl p-8 md:p-12 text-center">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">
                Bergabunglah dengan Klien Terpercaya Kami
            </h3>
            <p class="text-white/80 text-lg mb-8 max-w-2xl mx-auto">
                Ratusan perusahaan telah mempercayakan bisnis mereka kepada kami. Saatnya giliran Anda merasakan layanan terbaik.
            </p>
            <button class="bg-gradient-to-r from-blue-500 via-cyan-400 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                Mulai Konsultasi Gratis
            </button>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function animateCounter(el, target, suffix = '') {
            let start = 0;
            let end = parseInt(target, 10);
            let duration = 1500;
            let startTime = null;

            function updateCounter(currentTime) {
                if (!startTime) startTime = currentTime;
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                el.textContent = value + suffix;
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    el.textContent = end + suffix;
                }
            }
            requestAnimationFrame(updateCounter);
        }

        document.querySelectorAll('.stats-counter').forEach(function(el) {
            const target = el.getAttribute('data-target');
            let suffix = '';
            if (el.textContent.includes('+')) suffix = '+';
            if (el.textContent.includes('%')) suffix = '%';
            animateCounter(el, target, suffix);
        });
    });
</script>