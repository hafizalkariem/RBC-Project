@extends('layouts.app')

@section('fullwidth')
<!-- Hero/Title Section -->
<section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-blue-900/60 to-slate-900/80"></div>
    </div>
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="mb-6">
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
            <span class="px-4 py-2 {{ $bgColor }} text-white rounded-full text-sm font-medium">{{ $article->category->name }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent leading-tight">
            {{ $article->title }}
        </h1>
        <div class="flex flex-wrap items-center justify-center gap-6 text-gray-300 mb-8">
            <div class="flex items-center">
                <img src="{{ $article->author_avatar ?? 'https://via.placeholder.com/40x40/3b82f6/ffffff?text=A' }}" alt="Author" class="w-8 h-8 rounded-full mr-3">
                <span>{{ $article->author_name }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-calendar mr-2"></i>
                <span>{{ $article->published_at->format('d M Y') }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-clock mr-2"></i>
                <span>{{ $article->read_time }}</span>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <!-- Article Content -->
    <article class="prose prose-lg prose-invert max-w-none mb-12 blog-content">
        <div class="bg-slate-800/30 backdrop-blur-sm rounded-2xl p-8 border border-slate-700/50">
            <div class="text-gray-300 leading-relaxed blog-body">
                {!! $article->content !!}
            </div>
        </div>
    </article>

    <!-- Share Buttons -->
    <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50 mb-8">
        <h3 class="text-xl font-bold text-white mb-4">Bagikan Artikel</h3>
        <div class="flex flex-wrap gap-4">
            <button class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-300 hover:scale-105">
                <i class="fab fa-facebook-f mr-2"></i>
                Facebook
            </button>
            <button class="flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-all duration-300 hover:scale-105">
                <i class="fab fa-twitter mr-2"></i>
                Twitter
            </button>
            <button class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-300 hover:scale-105">
                <i class="fab fa-whatsapp mr-2"></i>
                WhatsApp
            </button>
            <button class="flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition-all duration-300 hover:scale-105">
                <i class="fab fa-linkedin-in mr-2"></i>
                LinkedIn
            </button>
            <button class="flex items-center px-4 py-2 bg-slate-600 hover:bg-slate-700 text-white rounded-lg transition-all duration-300 hover:scale-105">
                <i class="fas fa-link mr-2"></i>
                Copy Link
            </button>
        </div>
    </div>

    <!-- Tags -->
    <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50 mb-12">
        <h3 class="text-xl font-bold text-white mb-4">Tags</h3>
        <div class="flex flex-wrap gap-3">
            @foreach($article->tags as $index => $tag)
            @php
            $tagColors = [
            'blue' => 'bg-blue-500/20 text-blue-400 hover:bg-blue-500/30',
            'purple' => 'bg-purple-500/20 text-purple-400 hover:bg-purple-500/30',
            'green' => 'bg-green-500/20 text-green-400 hover:bg-green-500/30',
            'cyan' => 'bg-cyan-500/20 text-cyan-400 hover:bg-cyan-500/30',
            'yellow' => 'bg-yellow-500/20 text-yellow-400 hover:bg-yellow-500/30',
            'red' => 'bg-red-500/20 text-red-400 hover:bg-red-500/30'
            ];
            $tagClass = $tagColors[$tag->color] ?? 'bg-blue-500/20 text-blue-400 hover:bg-blue-500/30';
            @endphp
            <span class="px-4 py-2 {{ $tagClass }} rounded-full text-sm transition-colors duration-300 cursor-pointer">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>

    <!-- Related Articles -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-white mb-8">Artikel Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedArticles as $related)
            <article class="bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-300 hover:scale-105">
                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <a href="{{ route('blog.detail', $related->slug) }}" class="block">
                        <h3 class="font-bold text-white mb-2 hover:text-blue-400 transition-colors duration-300">
                            {{ $related->title }}
                        </h3>
                        <p class="text-gray-400 text-sm mb-3">{{ $related->excerpt }}</p>
                        <div class="text-xs text-gray-500">{{ $related->published_at->format('d M Y') }}</div>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>

    <!-- Comments Section -->
    <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-6 border border-slate-700/50 mb-12">
        <h3 class="text-2xl font-bold text-white mb-6">Komentar</h3>

        <!-- Comment Form -->
        <form class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <input type="text" placeholder="Nama Anda" class="px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-all duration-300">
                <input type="email" placeholder="Email Anda" class="px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-all duration-300">
            </div>
            <textarea rows="4" placeholder="Tulis komentar Anda..." class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-all duration-300 mb-4"></textarea>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg">
                Kirim Komentar
            </button>
        </form>

        <!-- Sample Comments -->
        <div class="space-y-6">
            <div class="flex space-x-4">
                <img src="https://via.placeholder.com/50x50/3b82f6/ffffff?text=JD" alt="Commenter" class="w-12 h-12 rounded-full">
                <div class="flex-1">
                    <div class="bg-slate-700/30 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-white">John Developer</h4>
                            <span class="text-xs text-gray-500">2 hari lalu</span>
                        </div>
                        <p class="text-gray-300">Artikel yang sangat informatif! Laravel 10 memang membawa banyak peningkatan yang signifikan. Terima kasih untuk penjelasan yang detail.</p>
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <img src="https://via.placeholder.com/50x50/8b5cf6/ffffff?text=SA" alt="Commenter" class="w-12 h-12 rounded-full">
                <div class="flex-1">
                    <div class="bg-slate-700/30 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-white">Sarah Ahmad</h4>
                            <span class="text-xs text-gray-500">1 hari lalu</span>
                        </div>
                        <p class="text-gray-300">Best practices yang dijelaskan sangat membantu. Saya akan coba implementasikan di proyek selanjutnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 backdrop-blur-sm rounded-3xl p-8 border border-blue-500/30 text-center">
        <h2 class="text-3xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
            Butuh Bantuan Development?
        </h2>
        <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
            Tim expert kami siap membantu mengembangkan aplikasi Laravel Anda dengan best practices terbaru
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-phone mr-2"></i>
                Konsultasi Gratis
            </button>
            <button class="px-8 py-4 bg-transparent border-2 border-blue-500 text-blue-400 rounded-xl font-semibold hover:bg-blue-500 hover:text-white transition-all duration-300 hover:scale-105">
                <i class="fas fa-envelope mr-2"></i>
                Subscribe Newsletter
            </button>
        </div>
    </div>
</div>

<!-- Prism.js untuk syntax highlighting -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

<style>
.blog-body h1 { @apply text-3xl font-bold text-white mb-6 mt-8 border-b border-slate-600 pb-3; }
.blog-body h2 { @apply text-2xl font-bold text-blue-400 mb-4 mt-8; }
.blog-body h3 { @apply text-xl font-bold text-purple-400 mb-3 mt-6; }
.blog-body p { @apply text-gray-300 leading-relaxed mb-4; }
.blog-body blockquote { @apply border-l-4 border-cyan-500 bg-cyan-500/10 p-4 mb-6 italic text-cyan-300; }
.blog-body pre { @apply bg-slate-900/80 rounded-xl p-4 mb-6 overflow-x-auto border border-slate-700 relative; }
.blog-body code { @apply bg-slate-700/50 px-2 py-1 rounded text-green-400 text-sm; }
.blog-body pre code { @apply bg-transparent p-0 text-gray-300; }
.blog-body img { @apply rounded-xl mb-6 border border-slate-700/50 shadow-lg; }
.blog-body a { @apply text-blue-400 hover:text-blue-300 underline transition-colors duration-300; }
.blog-body hr { @apply border-slate-600/30 my-8; }
.blog-body h4 { @apply text-lg font-bold text-cyan-400 mb-3 mt-6; }
.blog-body ul li { @apply text-gray-300 mb-2 pl-2; }
.blog-body ol li { @apply text-gray-300 mb-2 pl-2; }
.blog-body strong { @apply text-white font-semibold; }
.blog-body span[style*="font-size: 14pt"] { @apply text-xl font-bold text-yellow-400; }
.blog-body pre[class*="language-"] { @apply bg-slate-900/90 border border-slate-700/50 rounded-lg p-4 mb-6 overflow-x-auto; }
.blog-body code[class*="language-"] { @apply text-sm; }
.copy-btn { @apply absolute top-2 right-2 bg-slate-700 hover:bg-slate-600 text-white px-3 py-1 rounded text-xs transition-colors duration-300; }
</style>

<script>
    // Copy link functionality
    document.addEventListener('DOMContentLoaded', function() {
        const copyLinkBtn = document.querySelector('button:has(.fa-link)');
        if (copyLinkBtn) {
            copyLinkBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(window.location.href).then(function() {
                    // Change button text temporarily
                    const originalText = copyLinkBtn.innerHTML;
                    copyLinkBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
                    copyLinkBtn.classList.add('bg-green-600');

                    setTimeout(function() {
                        copyLinkBtn.innerHTML = originalText;
                        copyLinkBtn.classList.remove('bg-green-600');
                    }, 2000);
                });
            });
        }
    });

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Copy code functionality
    document.querySelectorAll('pre code').forEach((block) => {
        const pre = block.parentElement;
        const button = document.createElement('button');
        button.className = 'copy-btn';
        button.textContent = 'Copy';
        
        button.addEventListener('click', () => {
            navigator.clipboard.writeText(block.textContent).then(() => {
                button.textContent = 'Copied!';
                setTimeout(() => button.textContent = 'Copy', 2000);
            });
        });
        
        pre.appendChild(button);
    });

    // Auto-highlight code blocks
    if (typeof Prism !== 'undefined') {
        Prism.highlightAll();
    }
</script>
@endsection