@extends('layouts.app')

@section('fullwidth')
<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 animate-gradient"></div>
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent animate-glow">
            Blog & Insights
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
            Temukan tips, trik, dan insight terbaru seputar teknologi web development, digital marketing, dan tren industri
        </p>
    </div>
</section>
@endsection

@section('content')
<!-- Search & Filter Section -->
<section class="mb-12">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-6 items-center justify-between mb-8">
            <!-- Search Bar -->
            <div class="relative flex-1 max-w-md">
                <input type="text" id="searchInput" placeholder="Cari artikel..." class="w-full px-4 py-3 pl-12 bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-all duration-300">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            
            <!-- Filter Categories -->
            <div class="flex flex-wrap gap-3">
                <button class="filter-btn active px-4 py-2 rounded-full bg-blue-500 text-white text-sm transition-all duration-300 hover:scale-105" data-filter="all">
                    Semua
                </button>
                <button class="filter-btn px-4 py-2 rounded-full bg-slate-800 text-gray-300 text-sm transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="web-development">
                    Web Development
                </button>
                <button class="filter-btn px-4 py-2 rounded-full bg-slate-800 text-gray-300 text-sm transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="design">
                    Design
                </button>
                <button class="filter-btn px-4 py-2 rounded-full bg-slate-800 text-gray-300 text-sm transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="digital-marketing">
                    Digital Marketing
                </button>
                <button class="filter-btn px-4 py-2 rounded-full bg-slate-800 text-gray-300 text-sm transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="tutorial">
                    Tutorial
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Articles Grid -->
        <div class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12" id="articles-grid">
                <!-- Article Card 1 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="web-development">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/3b82f6?text=Web+Development" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-blue-500/80 text-white rounded-full text-xs font-medium">Web Development</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            Panduan Lengkap Laravel 10: Fitur Terbaru dan Best Practices
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Pelajari fitur-fitur terbaru Laravel 10 dan bagaimana mengimplementasikan best practices dalam pengembangan aplikasi web modern...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Admin RBC</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>15 Jan 2024</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.detail', 'panduan-lengkap-laravel-10') }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>

                <!-- Article Card 2 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="design">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/8b5cf6?text=UI+UX+Design" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-purple-500/80 text-white rounded-full text-xs font-medium">Design</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            Tren UI/UX Design 2024: Minimalism Meets Functionality
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Eksplorasi tren desain terbaru yang menggabungkan estetika minimalis dengan fungsionalitas maksimal untuk pengalaman pengguna yang optimal...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Sarah Design</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>12 Jan 2024</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.detail', 'tren-ui-ux-design-2024') }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>

                <!-- Article Card 3 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="digital-marketing">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/10b981?text=Digital+Marketing" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-green-500/80 text-white rounded-full text-xs font-medium">Digital Marketing</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            SEO Strategy 2024: Optimasi Website untuk Mesin Pencari
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Strategi SEO terkini untuk meningkatkan ranking website Anda di Google dengan teknik white-hat yang efektif dan sustainable...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Marketing Team</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>10 Jan 2024</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.detail', 'seo-strategy-2024') }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>

                <!-- Article Card 4 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="tutorial">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/f59e0b?text=Tutorial" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-yellow-500/80 text-white rounded-full text-xs font-medium">Tutorial</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            Tutorial: Membuat API RESTful dengan Laravel dan Sanctum
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Step-by-step tutorial lengkap untuk membuat API RESTful yang aman menggunakan Laravel Sanctum untuk autentikasi token-based...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Dev Team</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>8 Jan 2024</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.detail', 'tutorial-api-laravel-sanctum') }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>

                <!-- Article Card 5 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="web-development">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/06b6d4?text=React+JS" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-cyan-500/80 text-white rounded-full text-xs font-medium">Web Development</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            React 18: Fitur Concurrent Features dan Performance Optimization
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Mendalami fitur-fitur baru React 18 seperti Concurrent Features, Suspense, dan teknik optimasi performa untuk aplikasi yang lebih responsif...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Frontend Team</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>5 Jan 2024</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.detail', 'react-18-concurrent-features') }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>

                <!-- Article Card 6 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="design">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/ef4444?text=Mobile+Design" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-red-500/80 text-white rounded-full text-xs font-medium">Design</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            Mobile-First Design: Strategi Desain untuk Era Mobile
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Panduan komprehensif untuk menerapkan pendekatan mobile-first dalam desain website dan aplikasi untuk pengalaman pengguna yang optimal...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>UX Designer</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>3 Jan 2024</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.detail', 'mobile-first-design-strategy') }}" class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>n ranking website Anda di Google dengan teknik white-hat yang efektif dan sustainable...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Marketing Team</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>10 Jan 2024</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                            Baca Selengkapnya
                        </button>
                    </div>
                </article>

                <!-- Article Card 4 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="tutorial">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/f59e0b?text=Tutorial" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-yellow-500/80 text-white rounded-full text-xs font-medium">Tutorial</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            Tutorial: Membuat API RESTful dengan Laravel dan Sanctum
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Step-by-step tutorial lengkap untuk membuat API RESTful yang aman menggunakan Laravel Sanctum untuk autentikasi token-based...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Dev Team</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>8 Jan 2024</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                            Baca Selengkapnya
                        </button>
                    </div>
                </article>

                <!-- Article Card 5 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="web-development">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/06b6d4?text=React+JS" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-cyan-500/80 text-white rounded-full text-xs font-medium">Web Development</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            React 18: Fitur Concurrent Features dan Performance Optimization
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Mendalami fitur-fitur baru React 18 seperti Concurrent Features, Suspense, dan teknik optimasi performa untuk aplikasi yang lebih responsif...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Frontend Team</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>5 Jan 2024</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                            Baca Selengkapnya
                        </button>
                    </div>
                </article>

                <!-- Article Card 6 -->
                <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="design">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/1e293b/ef4444?text=Mobile+Design" alt="Article Image" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-red-500/80 text-white rounded-full text-xs font-medium">Design</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                            Mobile-First Design: Strategi Desain untuk Era Mobile
                        </h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">
                            Panduan komprehensif untuk menerapkan pendekatan mobile-first dalam desain website dan aplikasi untuk pengalaman pengguna yang optimal...
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>UX Designer</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>3 Jan 2024</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                            Baca Selengkapnya
                        </button>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2">
                <button class="px-4 py-2 bg-slate-800 text-gray-400 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300 disabled:opacity-50" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">1</button>
                <button class="px-4 py-2 bg-slate-800 text-gray-400 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300">2</button>
                <button class="px-4 py-2 bg-slate-800 text-gray-400 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300">3</button>
                <button class="px-4 py-2 bg-slate-800 text-gray-400 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="w-full lg:w-80 space-y-8">
            <!-- Categories -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50">
                <h3 class="text-xl font-bold mb-4 text-white">Kategori Populer</h3>
                <div class="space-y-3">
                    <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition-colors duration-300">
                        <span>Web Development</span>
                        <span class="text-sm bg-blue-500/20 text-blue-400 px-2 py-1 rounded-full">12</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition-colors duration-300">
                        <span>UI/UX Design</span>
                        <span class="text-sm bg-purple-500/20 text-purple-400 px-2 py-1 rounded-full">8</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition-colors duration-300">
                        <span>Digital Marketing</span>
                        <span class="text-sm bg-green-500/20 text-green-400 px-2 py-1 rounded-full">6</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition-colors duration-300">
                        <span>Tutorial</span>
                        <span class="text-sm bg-yellow-500/20 text-yellow-400 px-2 py-1 rounded-full">10</span>
                    </a>
                </div>
            </div>

            <!-- Recent Articles -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50">
                <h3 class="text-xl font-bold mb-4 text-white">Artikel Terbaru</h3>
                <div class="space-y-4">
                    <a href="#" class="flex items-start space-x-3 group">
                        <img src="https://via.placeholder.com/60x60/3b82f6/ffffff?text=1" alt="Article" class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                                Tips Optimasi Database MySQL untuk Performa Maksimal
                            </h4>
                            <p class="text-xs text-gray-500 mt-1">2 hari lalu</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-start space-x-3 group">
                        <img src="https://via.placeholder.com/60x60/8b5cf6/ffffff?text=2" alt="Article" class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                                Panduan Lengkap Implementasi PWA
                            </h4>
                            <p class="text-xs text-gray-500 mt-1">3 hari lalu</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-start space-x-3 group">
                        <img src="https://via.placeholder.com/60x60/10b981/ffffff?text=3" alt="Article" class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                                Strategi Content Marketing yang Efektif
                            </h4>
                            <p class="text-xs text-gray-500 mt-1">5 hari lalu</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Newsletter Subscribe -->
            <div class="bg-gradient-to-br from-blue-600/20 to-purple-600/20 backdrop-blur-sm rounded-2xl p-6 border border-blue-500/30">
                <h3 class="text-xl font-bold mb-3 text-white">Subscribe Newsletter</h3>
                <p class="text-gray-300 text-sm mb-4">Dapatkan update artikel terbaru langsung di email Anda</p>
                <form class="space-y-3">
                    <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700/50 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-all duration-300">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                        Subscribe
                    </button>
                </form>
            </div>
        </aside>
    </div>
</div>

<!-- Call to Action -->
<section class="mt-20 mb-12">
    <div class="max-w-4xl mx-auto text-center">
        <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 backdrop-blur-sm rounded-3xl p-12 border border-blue-500/30">
            <h2 class="text-4xl font-bold mb-6 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Butuh Konsultasi Digital?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Tim ahli kami siap membantu mewujudkan ide digital Anda menjadi kenyataan
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Konsultasi Gratis
                </button>
                <button class="px-8 py-4 bg-transparent border-2 border-blue-500 text-blue-400 rounded-xl font-semibold hover:bg-blue-500 hover:text-white transition-all duration-300 hover:scale-105">
                    <i class="fas fa-envelope mr-2"></i>
                    Hubungi Kami
                </button>
            </div>
        </div>
    </div>
</section>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const articles = document.querySelectorAll('.article-card');
    
    articles.forEach(article => {
        const title = article.querySelector('h3').textContent.toLowerCase();
        const content = article.querySelector('p').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || content.includes(searchTerm)) {
            article.style.display = 'block';
            article.style.animation = 'fadeIn 0.5s ease-in-out';
        } else {
            article.style.display = 'none';
        }
    });
});

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const articles = document.querySelectorAll('.article-card');

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
            
            // Filter articles
            articles.forEach(article => {
                if (filter === 'all' || article.getAttribute('data-category') === filter) {
                    article.style.display = 'block';
                    article.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    article.style.display = 'none';
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
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
`;
document.head.appendChild(style);
</script>
@endsection