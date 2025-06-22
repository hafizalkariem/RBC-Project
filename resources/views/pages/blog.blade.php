@extends('layouts.app')

@section('fullwidth')
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-300 bg-clip-text text-transparent py-2">
            Blog & Insights
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Temukan tips, trik, dan insight terbaru seputar teknologi web development, digital marketing, dan tren industri
        </p>
    </div>
</section>


@section('content')
<div class="bg-gradient-to-br from-slate-900 via-slate-800 to-gray-900 min-h-screen py-10">
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
                    @foreach($categories as $category)
                    <button class="filter-btn px-4 py-2 rounded-full bg-slate-800 text-gray-300 text-sm transition-all duration-300 hover:bg-blue-500 hover:text-white hover:scale-105" data-filter="{{ $category->slug }}">
                        {{ $category->name }}
                    </button>
                    @endforeach
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
                    @foreach($articles as $article)
                    <article class="article-card bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20" data-category="{{ $article->category->slug }}">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                            <div class="absolute top-4 left-4">
                                @php
                                $categoryColors = [
                                'blue' => 'bg-blue-500/80',
                                'purple' => 'bg-purple-500/80',
                                'green' => 'bg-green-500/80',
                                'yellow' => 'bg-yellow-500/80',
                                'red' => 'bg-red-500/80',
                                'cyan' => 'bg-cyan-500/80'
                                ];
                                $bgColor = $categoryColors[$article->category->color] ?? 'bg-blue-500/80';
                                @endphp
                                <span class="px-3 py-1 {{ $bgColor }} text-white rounded-full text-xs font-medium">{{ $article->category->name }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 text-white hover:text-blue-400 transition-colors duration-300">
                                {{ $article->title }}
                            </h3>
                            <p class="text-gray-400 mb-4 line-clamp-3">
                                {{ $article->excerpt }}
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-2"></i>
                                    <span>{{ $article->author_name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>{{ $article->published_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <a href="{{ route('blog.detail', $article->slug) }}" class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg text-center">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $articles->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="w-full lg:w-80 space-y-8">
                <!-- Categories -->
                <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50">
                    <h3 class="text-xl font-bold mb-4 text-white">Kategori Populer</h3>
                    <div class="space-y-3">
                        @foreach($categories as $category)
                        <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition-colors duration-300">
                            <span>{{ $category->name }}</span>
                            @php
                            $badgeColors = [
                            'blue' => 'bg-blue-500/20 text-blue-400',
                            'purple' => 'bg-purple-500/20 text-purple-400',
                            'green' => 'bg-green-500/20 text-green-400',
                            'yellow' => 'bg-yellow-500/20 text-yellow-400',
                            'red' => 'bg-red-500/20 text-red-400',
                            'cyan' => 'bg-cyan-500/20 text-cyan-400'
                            ];
                            $badgeClass = $badgeColors[$category->color] ?? 'bg-blue-500/20 text-blue-400';
                            @endphp
                            <span class="text-sm {{ $badgeClass }} px-2 py-1 rounded-full">{{ $category->published_articles_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Articles -->
                <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50">
                    <h3 class="text-xl font-bold mb-4 text-white">Artikel Terbaru</h3>
                    <div class="space-y-4">
                        @foreach($recentArticles as $recent)
                        <a href="{{ route('blog.detail', $recent->slug) }}" class="flex items-start space-x-3 group">
                            <img src="{{ asset('storage/' . $recent->featured_image) }}" alt="{{ $recent->title }}" class="w-12 h-12 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                                    {{ $recent->title }}
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $recent->published_at->diffForHumans() }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter Subscribe -->
                <div class="bg-gradient-to-br from-slate-800/60 to-slate-700/60 backdrop-blur-sm rounded-2xl p-6 border border-slate-600/50">
                    <h3 class="text-xl font-bold mb-3 text-white">Subscribe Newsletter</h3>
                    <p class="text-gray-300 text-sm mb-4">Dapatkan update artikel terbaru langsung di email Anda</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700/50 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-all duration-300">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg">
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
            <div class="bg-gradient-to-r from-slate-800/60 to-slate-700/60 backdrop-blur-sm rounded-3xl p-12 border border-slate-600/50">
                <h2 class="text-4xl font-bold mb-6 bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                    Butuh Konsultasi Digital?
                </h2>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                    Tim ahli kami siap membantu mewujudkan ide digital Anda menjadi kenyataan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:scale-105 hover:shadow-lg">
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
</div>
@endsection