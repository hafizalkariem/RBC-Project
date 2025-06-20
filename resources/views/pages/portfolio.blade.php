@extends('layouts.app')

@section('fullwidth')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 animate-gradient"></div>
    <div class="relative z-10 text-center px-4 max-w-6xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent animate-glow">
            Portfolio Kami
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
            Jelajahi koleksi proyek digital terbaik kami yang telah membantu berbagai klien mencapai kesuksesan
        </p>
        <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base">
            <span class="px-4 py-2 bg-blue-500/20 rounded-full border border-blue-500/30">100+ Proyek Selesai</span>
            <span class="px-4 py-2 bg-purple-500/20 rounded-full border border-purple-500/30">50+ Klien Puas</span>
            <span class="px-4 py-2 bg-cyan-500/20 rounded-full border border-cyan-500/30">5+ Tahun Pengalaman</span>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Filter Kategori -->
<section class="mb-16">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="filter-btn active px-6 py-3 rounded-full bg-blue-500 text-white transition-all duration-300 hover:bg-blue-600 hover:scale-105" data-filter="all">
                Semua Proyek
            </button>
            <button class="filter-btn px-6 py-3 rounded-full bg-slate-800 text-gray-300 transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="website">
                Website
            </button>
            <button class="filter-btn px-6 py-3 rounded-full bg-slate-800 text-gray-300 transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="ecommerce">
                E-commerce
            </button>
            <button class="filter-btn px-6 py-3 rounded-full bg-slate-800 text-gray-300 transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="company">
                Company Profile
            </button>
            <button class="filter-btn px-6 py-3 rounded-full bg-slate-800 text-gray-300 transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="mobile">
                Mobile App
            </button>
        </div>
    </div>
</section>

<!-- Daftar Proyek -->
<section class="mb-20">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <!-- Project Card 1 -->
            <div class="project-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="website">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250/1e293b/3b82f6?text=Website+Project" alt="Website Project" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Corporate Website</h3>
                    <p class="text-gray-400 mb-4">Website perusahaan modern dengan desain responsif dan performa optimal</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Laravel</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">Vue.js</span>
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Tailwind</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Project Card 2 -->
            <div class="project-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="ecommerce">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250/1e293b/10b981?text=E-commerce+Store" alt="E-commerce Project" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Online Store</h3>
                    <p class="text-gray-400 mb-4">Platform e-commerce lengkap dengan sistem pembayaran terintegrasi</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">React</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">Node.js</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">MongoDB</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Project Card 3 -->
            <div class="project-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="mobile">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250/1e293b/8b5cf6?text=Mobile+App" alt="Mobile App Project" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Mobile Application</h3>
                    <p class="text-gray-400 mb-4">Aplikasi mobile cross-platform dengan UI/UX yang intuitif</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Flutter</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-400 rounded-full text-sm">Firebase</span>
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Dart</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Project Card 4 -->
            <div class="project-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="company">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250/1e293b/06b6d4?text=Company+Profile" alt="Company Profile" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Company Profile</h3>
                    <p class="text-gray-400 mb-4">Profil perusahaan digital yang elegan dan profesional</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">HTML5</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">CSS3</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">JavaScript</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Project Card 5 -->
            <div class="project-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="website">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250/1e293b/f59e0b?text=Portfolio+Website" alt="Portfolio Website" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Portfolio Website</h3>
                    <p class="text-gray-400 mb-4">Website portfolio kreatif dengan animasi dan interaksi menarik</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Next.js</span>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">TypeScript</span>
                        <span class="px-3 py-1 bg-pink-500/20 text-pink-400 rounded-full text-sm">Framer Motion</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Project Card 6 -->
            <div class="project-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="ecommerce">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250/1e293b/ef4444?text=Marketplace+App" alt="Marketplace App" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Marketplace Platform</h3>
                    <p class="text-gray-400 mb-4">Platform marketplace multi-vendor dengan fitur lengkap</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Laravel</span>
                        <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">Redis</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">MySQL</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Portfolio -->
<section class="mb-20">
    <div class="max-w-7xl mx-auto">
        <div class="bg-gradient-to-r from-slate-800/50 to-slate-900/50 backdrop-blur-sm rounded-3xl p-8 border border-slate-700/50">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="group">
                    <div class="text-4xl md:text-5xl font-bold text-blue-400 mb-2 group-hover:scale-110 transition-transform duration-300">100+</div>
                    <div class="text-gray-400">Proyek Selesai</div>
                </div>
                <div class="group">
                    <div class="text-4xl md:text-5xl font-bold text-purple-400 mb-2 group-hover:scale-110 transition-transform duration-300">50+</div>
                    <div class="text-gray-400">Klien Puas</div>
                </div>
                <div class="group">
                    <div class="text-4xl md:text-5xl font-bold text-cyan-400 mb-2 group-hover:scale-110 transition-transform duration-300">5+</div>
                    <div class="text-gray-400">Tahun Pengalaman</div>
                </div>
                <div class="group">
                    <div class="text-4xl md:text-5xl font-bold text-green-400 mb-2 group-hover:scale-110 transition-transform duration-300">4.9</div>
                    <div class="text-gray-400">Rating Rata-rata</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni Klien -->
<section class="mb-20">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold text-center mb-12 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
            Testimoni Klien
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimoni 1 -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50 hover:border-blue-500/50 transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/60x60/3b82f6/ffffff?text=JD" alt="Client" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-white">John Doe</h4>
                        <p class="text-gray-400 text-sm">CEO, Tech Company</p>
                    </div>
                </div>
                <p class="text-gray-300 italic">"RBC Project memberikan solusi digital yang luar biasa. Website kami menjadi lebih modern dan performa meningkat drastis."</p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50 hover:border-blue-500/50 transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/60x60/8b5cf6/ffffff?text=SA" alt="Client" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-white">Sarah Ahmad</h4>
                        <p class="text-gray-400 text-sm">Founder, E-commerce Store</p>
                    </div>
                </div>
                <p class="text-gray-300 italic">"Platform e-commerce yang dibuat sangat user-friendly dan membantu meningkatkan penjualan online kami secara signifikan."</p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50 hover:border-blue-500/50 transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/60x60/10b981/ffffff?text=MR" alt="Client" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-white">Michael Rodriguez</h4>
                        <p class="text-gray-400 text-sm">Director, Marketing Agency</p>
                    </div>
                </div>
                <p class="text-gray-300 italic">"Tim RBC sangat profesional dan responsif. Aplikasi mobile yang dibuat sesuai dengan ekspektasi dan deadline yang ketat."</p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Klien Kami -->
<section class="mb-20">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold text-center mb-12 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
            Klien Kami
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            <div class="bg-slate-800/30 backdrop-blur-sm rounded-xl p-6 border border-slate-700/30 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center">
                <img src="https://via.placeholder.com/120x60/64748b/ffffff?text=LOGO1" alt="Client Logo" class="max-w-full h-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
            </div>
            <div class="bg-slate-800/30 backdrop-blur-sm rounded-xl p-6 border border-slate-700/30 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center">
                <img src="https://via.placeholder.com/120x60/64748b/ffffff?text=LOGO2" alt="Client Logo" class="max-w-full h-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
            </div>
            <div class="bg-slate-800/30 backdrop-blur-sm rounded-xl p-6 border border-slate-700/30 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center">
                <img src="https://via.placeholder.com/120x60/64748b/ffffff?text=LOGO3" alt="Client Logo" class="max-w-full h-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
            </div>
            <div class="bg-slate-800/30 backdrop-blur-sm rounded-xl p-6 border border-slate-700/30 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center">
                <img src="https://via.placeholder.com/120x60/64748b/ffffff?text=LOGO4" alt="Client Logo" class="max-w-full h-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
            </div>
            <div class="bg-slate-800/30 backdrop-blur-sm rounded-xl p-6 border border-slate-700/30 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center">
                <img src="https://via.placeholder.com/120x60/64748b/ffffff?text=LOGO5" alt="Client Logo" class="max-w-full h-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
            </div>
            <div class="bg-slate-800/30 backdrop-blur-sm rounded-xl p-6 border border-slate-700/30 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 flex items-center justify-center">
                <img src="https://via.placeholder.com/120x60/64748b/ffffff?text=LOGO6" alt="Client Logo" class="max-w-full h-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
            </div>
        </div>
    </div>
</section>

<!-- Ajakan Konsultasi -->
<section class="mb-20">
    <div class="max-w-4xl mx-auto text-center">
        <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 backdrop-blur-sm rounded-3xl p-12 border border-blue-500/30">
            <h2 class="text-4xl font-bold mb-6 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Siap Memulai Proyek Anda?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Mari diskusikan ide dan kebutuhan digital Anda. Tim ahli kami siap membantu mewujudkan visi bisnis Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Konsultasi Gratis
                </button>
                <button class="px-8 py-4 bg-transparent border-2 border-blue-500 text-blue-400 rounded-xl font-semibold hover:bg-blue-500 hover:text-white transition-all duration-300 hover:scale-105">
                    <i class="fas fa-envelope mr-2"></i>
                    Kirim Pesan
                </button>
            </div>
        </div>
    </div>
</section>

<script>
// Filter Portfolio
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-blue-500', 'text-white');
                b.classList.add('bg-slate-800', 'text-gray-300');
            });
            this.classList.add('active', 'bg-blue-500', 'text-white');
            this.classList.remove('bg-slate-800', 'text-gray-300');
            
            // Filter projects
            projectCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

// Add fadeIn animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>
@endsection