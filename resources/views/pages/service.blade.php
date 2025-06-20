@extends('layouts.app')

@section('fullwidth')
<div class="container mx-auto max-w-7xl py-20 md:py-28">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6 bg-gradient-to-r from-blue-400 via-purple-500 to-cyan-400 bg-clip-text text-transparent drop-shadow-lg animate-gradient-x">
            Jasa Pembuatan Website Profesional
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto font-light">
            Wujudkan visi digital Anda dengan solusi website profesional yang modern, responsif, dan SEO-friendly
        </p>
    </div>

    <!-- Divider -->
    <div class="border-t border-blue-500/20 mb-20"></div>

    <!-- Value Proposition Section -->
    <section class="mb-20">
        <div class="bg-gradient-to-br from-gray-800/60 to-gray-900/80 backdrop-blur-xl rounded-3xl p-10 border border-blue-700/30 shadow-2xl hover:shadow-blue-500/10 transition-all duration-700">
            <h2 class="text-3xl font-bold text-center mb-12 text-blue-400 animate-fade-in">Mengapa Memilih RBC?</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="text-center transform hover:scale-105 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl group-hover:shadow-blue-500/60 transition-all duration-500 animate-float">
                        <i class="fas fa-rocket text-3xl text-white animate-pulse"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">Teknologi Terdepan</h3>
                    <p class="text-gray-300">Menggunakan framework dan teknologi terbaru untuk performa optimal</p>
                </div>
                <div class="text-center transform hover:scale-105 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl group-hover:shadow-purple-500/60 transition-all duration-500 animate-float">
                        <i class="fas fa-code text-3xl text-white animate-pulse"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 bg-gradient-to-r from-purple-400 to-purple-600 bg-clip-text text-transparent">Tim Berpengalaman</h3>
                    <p class="text-gray-300">Developer profesional dengan pengalaman 5+ tahun</p>
                </div>
                <div class="text-center transform hover:scale-105 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-cyan-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl group-hover:shadow-cyan-500/60 transition-all duration-500 animate-float">
                        <i class="fas fa-clock text-3xl text-white animate-pulse"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 bg-gradient-to-r from-cyan-400 to-cyan-600 bg-clip-text text-transparent">Support 24/7</h3>
                    <p class="text-gray-300">Dukungan teknis dan maintenance berkelanjutan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <div class="border-t border-purple-500/20 mb-20"></div>

    <!-- Paket Layanan Section -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-400">Paket Layanan</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <!-- Basic Package -->
            <div class="bg-gradient-to-br from-gray-800/70 to-gray-900/80 rounded-3xl p-8 border border-gray-700 hover:border-blue-500 shadow-xl hover:shadow-blue-500/30 transition-all duration-500 group">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold mb-2">Basic</h3>
                    <div class="text-4xl font-bold text-blue-400 mb-2">Rp 5jt</div>
                    <p class="text-gray-400">Cocok untuk bisnis kecil</p>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>5 Halaman Website</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Responsive Design</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>SEO Basic</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Contact Form</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>1 Bulan Support</li>
                </ul>
                <button class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white py-3 rounded-lg font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    Pilih Paket
                </button>
            </div>

            <!-- Business Package -->
            <div class="bg-gradient-to-br from-gray-800/70 to-gray-900/80 rounded-3xl p-8 border-2 border-blue-500 hover:border-blue-400 transition-all duration-300 relative group">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span class="bg-blue-500 text-white px-4 py-1 rounded-full text-sm">Populer</span>
                </div>
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold mb-2">Business</h3>
                    <div class="text-4xl font-bold text-blue-400 mb-2">Rp 12jt</div>
                    <p class="text-gray-400">Untuk bisnis menengah</p>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>15 Halaman Website</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>CMS Integration</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>E-commerce Basic</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>SEO Advanced</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>3 Bulan Support</li>
                </ul>
                <button class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white py-3 rounded-lg font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    Pilih Paket
                </button>
            </div>

            <!-- Enterprise Package -->
            <div class="bg-gradient-to-br from-gray-800/70 to-gray-900/80 rounded-3xl p-8 border border-gray-700 hover:border-purple-500 transition-all duration-300 group">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                    <div class="text-4xl font-bold text-purple-400 mb-2">Rp 25jt</div>
                    <p class="text-gray-400">Solusi enterprise</p>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Unlimited Pages</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>Custom Development</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>E-commerce Advanced</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>API Integration</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-400 mr-3"></i>12 Bulan Support</li>
                </ul>
                <button class="w-full bg-gradient-to-r from-purple-600 to-purple-500 hover:from-purple-700 hover:to-purple-600 text-white py-3 rounded-lg font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    Pilih Paket
                </button>
            </div>
        </div>
    </section>

    <!-- Studi Kasus Section -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-400">Studi Kasus Terkait</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-gray-900 rounded-2xl border border-gray-800 hover:border-blue-500 shadow-lg overflow-hidden group transition-all duration-300 hover:-translate-y-2">
                <div class="relative">
                    <div class="h-44 flex items-center justify-center bg-gradient-to-br from-blue-500 via-purple-500 to-cyan-400 group-hover:scale-105 transition-transform duration-500">
                        <i class="fas fa-shopping-cart text-5xl text-white drop-shadow-lg"></i>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-blue-600/80 text-white text-xs px-3 py-1 rounded-full">E-commerce</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-lg font-bold group-hover:text-blue-400 transition-colors">E-commerce Fashion</h3>
                    <p class="text-gray-300 text-sm mb-2">Platform e-commerce dengan sistem inventory dan payment gateway terintegrasi</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-xs">Laravel</span>
                        <span class="bg-purple-500/20 text-purple-400 px-3 py-1 rounded-full text-xs">Vue.js</span>
                    </div>
                    <a href="#" class="mt-auto inline-block text-blue-400 hover:text-blue-300 text-sm font-semibold transition-colors">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-gray-900 rounded-2xl border border-gray-800 hover:border-cyan-500 shadow-lg overflow-hidden group transition-all duration-300 hover:-translate-y-2">
                <div class="relative">
                    <div class="h-44 flex items-center justify-center bg-gradient-to-br from-cyan-500 via-blue-500 to-blue-600 group-hover:scale-105 transition-transform duration-500">
                        <i class="fas fa-hospital text-5xl text-white drop-shadow-lg"></i>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-cyan-600/80 text-white text-xs px-3 py-1 rounded-full">Klinik</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-lg font-bold group-hover:text-cyan-400 transition-colors">Sistem Klinik</h3>
                    <p class="text-gray-300 text-sm mb-2">Aplikasi manajemen klinik dengan fitur appointment dan rekam medis</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-cyan-500/20 text-cyan-400 px-3 py-1 rounded-full text-xs">PHP</span>
                        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-xs">MySQL</span>
                    </div>
                    <a href="#" class="mt-auto inline-block text-cyan-400 hover:text-cyan-300 text-sm font-semibold transition-colors">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-gray-900 rounded-2xl border border-gray-800 hover:border-green-500 shadow-lg overflow-hidden group transition-all duration-300 hover:-translate-y-2">
                <div class="relative">
                    <div class="h-44 flex items-center justify-center bg-gradient-to-br from-green-500 via-cyan-500 to-cyan-600 group-hover:scale-105 transition-transform duration-500">
                        <i class="fas fa-graduation-cap text-5xl text-white drop-shadow-lg"></i>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-600/80 text-white text-xs px-3 py-1 rounded-full">Edukasi</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-lg font-bold group-hover:text-green-400 transition-colors">Portal Edukasi</h3>
                    <p class="text-gray-300 text-sm mb-2">Platform pembelajaran online dengan sistem quiz dan sertifikat</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs">React</span>
                        <span class="bg-cyan-500/20 text-cyan-400 px-3 py-1 rounded-full text-xs">Node.js</span>
                    </div>
                    <a href="#" class="mt-auto inline-block text-green-400 hover:text-green-300 text-sm font-semibold transition-colors">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-400">Frequently Asked Questions</h2>
        <div class="max-w-4xl mx-auto space-y-4">
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg border border-gray-700">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Berapa lama waktu pengerjaan website?</h3>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-gray-300">Waktu pengerjaan bervariasi tergantung kompleksitas. Website basic 2-3 minggu, business 4-6 minggu, dan enterprise 8-12 minggu.</p>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg border border-gray-700">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Apakah termasuk hosting dan domain?</h3>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-gray-300">Paket kami fokus pada pengembangan. Hosting dan domain dapat kami bantu setup dengan biaya terpisah sesuai kebutuhan.</p>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg border border-gray-700">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Bagaimana sistem pembayaran?</h3>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-gray-300">Pembayaran dapat dicicil: 50% di awal, 30% saat preview, dan 20% saat serah terima. Kami menerima transfer bank dan e-wallet.</p>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg border border-gray-700">
                <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Apakah website akan mobile-friendly?</h3>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </div>
                </button>
                <div class="hidden px-6 pb-6">
                    <p class="text-gray-300">Ya, semua website yang kami buat menggunakan responsive design yang optimal di desktop, tablet, dan mobile.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulir Konsultasi Section -->
    <section class="mb-20">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 text-blue-400">Konsultasi Gratis</h2>
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-700">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors" placeholder="nama@email.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">No. Telepon</label>
                        <input type="tel" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors" placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Deskripsi Kebutuhan</label>
                        <textarea rows="5" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Ceritakan kebutuhan website Anda..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Konsultasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

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