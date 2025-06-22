@extends('layouts.app')

@section('fullwidth')
<!-- Hero Section -->
<section class="py-20 md:py-28 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
            Layanan <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Digital</span> Profesional
        </h1>
        <p class="text-xl text-white/80 max-w-3xl mx-auto mb-8">
            Kami menyediakan solusi digital end-to-end untuk mengembangkan bisnis Anda dengan teknologi terdepan dan tim berpengalaman
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#services" class="bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-4 rounded-xl text-white font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-rocket mr-2"></i>Lihat Layanan
            </a>
            <a href="#consultation" class="glass px-8 py-4 rounded-xl text-white font-semibold hover:bg-white/20 transition-all duration-300">
                <i class="fas fa-comments mr-2"></i>Konsultasi Gratis
            </a>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="services" class="py-20 bg-transparent">
    <div class="container mx-auto px-6">
        <x-service-card :services="$services" />
    </div>
</section>

<!-- Process Section -->
<section class="py-20 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-16 text-white">
            Proses <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Kerja Kami</span>
        </h2>
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-comments text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">1. Konsultasi</h3>
                <p class="text-white/70">Diskusi kebutuhan dan analisis requirement project Anda</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-drafting-compass text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">2. Design</h3>
                <p class="text-white/70">Pembuatan mockup dan prototype sesuai brand identity</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-code text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">3. Development</h3>
                <p class="text-white/70">Coding dan implementasi fitur dengan teknologi terdepan</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">4. Launch</h3>
                <p class="text-white/70">Testing, deployment, dan maintenance berkelanjutan</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="py-20 bg-transparent">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-16 text-white">
            Paket <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Layanan</span>
        </h2>
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Basic Package -->
            <div class="glass-card rounded-3xl p-8 text-white border-2 border-transparent hover:border-blue-500/50 transition-all duration-300">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold mb-4">Basic</h3>
                    <div class="text-4xl font-bold text-blue-400 mb-2">Rp 2.5jt</div>
                    <p class="text-white/70">Perfect untuk startup</p>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Landing Page Responsive</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Contact Form</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>SEO Basic</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Mobile Optimized</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>1 Bulan Support</li>
                </ul>
                <button class="w-full glass-button py-4 rounded-xl font-semibold hover:scale-105 transition-all duration-300">
                    Pilih Paket
                </button>
            </div>

            <!-- Business Package -->
            <div class="glass-card rounded-3xl p-8 text-white border-2 border-purple-500/50 relative transform scale-105">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-2 rounded-full text-sm font-semibold">POPULAR</span>
                </div>
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold mb-4">Business</h3>
                    <div class="text-4xl font-bold text-purple-400 mb-2">Rp 5.5jt</div>
                    <p class="text-white/70">Untuk bisnis berkembang</p>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Website Multi-page</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>CMS Integration</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>E-commerce Basic</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Payment Gateway</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>3 Bulan Support</li>
                </ul>
                <button class="w-full bg-gradient-to-r from-purple-500 to-pink-500 py-4 rounded-xl font-semibold hover:scale-105 transition-all duration-300">
                    Pilih Paket
                </button>
            </div>

            <!-- Enterprise Package -->
            <div class="glass-card rounded-3xl p-8 text-white border-2 border-transparent hover:border-orange-500/50 transition-all duration-300">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold mb-4">Enterprise</h3>
                    <div class="text-4xl font-bold text-orange-400 mb-2">Custom</div>
                    <p class="text-white/70">Solusi enterprise</p>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Custom Development</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Advanced Features</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>API Integration</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Dedicated Support</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Lifetime Maintenance</li>
                </ul>
                <button class="w-full glass-button py-4 rounded-xl font-semibold hover:scale-105 transition-all duration-300">
                    Konsultasi
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Showcase -->
<section class="py-20 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-16 text-white">
            Portfolio <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Terbaru</span>
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="glass-card rounded-2xl overflow-hidden group hover:scale-105 transition-all duration-300">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-5xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">E-commerce Fashion</h3>
                    <p class="text-white/70 mb-4">Platform e-commerce dengan sistem inventory dan payment gateway</p>
                    <div class="flex gap-2 mb-4">
                        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-xs">Laravel</span>
                        <span class="bg-purple-500/20 text-purple-400 px-3 py-1 rounded-full text-xs">Vue.js</span>
                    </div>
                    <a href="#" class="text-blue-400 hover:text-blue-300 font-semibold">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

            <div class="glass-card rounded-2xl overflow-hidden group hover:scale-105 transition-all duration-300">
                <div class="h-48 bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-hospital text-5xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">Sistem Klinik</h3>
                    <p class="text-white/70 mb-4">Aplikasi manajemen klinik dengan fitur appointment dan rekam medis</p>
                    <div class="flex gap-2 mb-4">
                        <span class="bg-cyan-500/20 text-cyan-400 px-3 py-1 rounded-full text-xs">PHP</span>
                        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-xs">MySQL</span>
                    </div>
                    <a href="#" class="text-cyan-400 hover:text-cyan-300 font-semibold">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

            <div class="glass-card rounded-2xl overflow-hidden group hover:scale-105 transition-all duration-300">
                <div class="h-48 bg-gradient-to-br from-green-500 to-cyan-600 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-5xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">Portal Edukasi</h3>
                    <p class="text-white/70 mb-4">Platform pembelajaran online dengan sistem quiz dan sertifikat</p>
                    <div class="flex gap-2 mb-4">
                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs">React</span>
                        <span class="bg-cyan-500/20 text-cyan-400 px-3 py-1 rounded-full text-xs">Node.js</span>
                    </div>
                    <a href="#" class="text-green-400 hover:text-green-300 font-semibold">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-transparent">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-16 text-white">
            Frequently <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Asked Questions</span>
        </h2>
        <div class="max-w-4xl mx-auto space-y-4">
            <div class="glass-card rounded-xl border border-white/10">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">Berapa lama waktu pengerjaan website?</h3>
                        <i class="fas fa-chevron-down text-white/60 transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-white/70">Waktu pengerjaan bervariasi: Basic (2-3 minggu), Business (4-6 minggu), Enterprise (8-12 minggu) tergantung kompleksitas fitur.</p>
                </div>
            </div>

            <div class="glass-card rounded-xl border border-white/10">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">Apakah termasuk hosting dan domain?</h3>
                        <i class="fas fa-chevron-down text-white/60 transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-white/70">Paket fokus pada development. Hosting dan domain dapat kami bantu setup dengan biaya terpisah sesuai kebutuhan Anda.</p>
                </div>
            </div>

            <div class="glass-card rounded-xl border border-white/10">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">Bagaimana sistem pembayaran?</h3>
                        <i class="fas fa-chevron-down text-white/60 transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-white/70">Pembayaran bertahap: 50% di awal, 30% saat preview, 20% saat serah terima. Menerima transfer bank dan e-wallet.</p>
                </div>
            </div>

            <div class="glass-card rounded-xl border border-white/10">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">Apakah website akan mobile-friendly?</h3>
                        <i class="fas fa-chevron-down text-white/60 transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-white/70">Ya, semua website menggunakan responsive design yang optimal di desktop, tablet, dan mobile dengan performa terbaik.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Consultation Form -->
<section id="consultation" class="py-20 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16 text-white">
                Konsultasi <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Gratis</span>
            </h2>
            <div class="glass-card rounded-3xl p-8">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-medium mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50" placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-white font-medium mb-2">Email</label>
                            <input type="email" class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50" placeholder="nama@email.com">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-medium mb-2">No. WhatsApp</label>
                            <input type="tel" class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50" placeholder="+62 812-3456-7890">
                        </div>
                        <div>
                            <label class="block text-white font-medium mb-2">Jenis Layanan</label>
                            <select class="w-full glass rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400/50">
                                <option value="" class="bg-gray-800">Pilih Layanan</option>
                                <option value="website" class="bg-gray-800">Website Development</option>
                                <option value="ecommerce" class="bg-gray-800">E-commerce</option>
                                <option value="mobile" class="bg-gray-800">Mobile App</option>
                                <option value="custom" class="bg-gray-800">Custom Development</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-white font-medium mb-2">Deskripsi Project</label>
                        <textarea rows="4" class="w-full glass rounded-lg px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 resize-none" placeholder="Ceritakan detail project yang Anda inginkan..."></textarea>
                    </div>
                    <div>
                        <label class="block text-white font-medium mb-2">Budget Range</label>
                        <select class="w-full glass rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400/50">
                            <option value="" class="bg-gray-800">Pilih Budget</option>
                            <option value="under-5" class="bg-gray-800">Di bawah Rp 5 Juta</option>
                            <option value="5-15" class="bg-gray-800">Rp 5 - 15 Juta</option>
                            <option value="15-50" class="bg-gray-800">Rp 15 - 50 Juta</option>
                            <option value="above-50" class="bg-gray-800">Di atas Rp 50 Juta</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 py-4 rounded-xl text-white font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Konsultasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        content.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>
@endsection