@extends('layouts.app')

@section('fullwidth')
<!-- Hero/Title Section -->
<section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ $article['image'] }}" alt="Article Cover" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-blue-900/60 to-slate-900/80"></div>
    </div>
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="mb-6">
            <span class="px-4 py-2 bg-blue-500/80 text-white rounded-full text-sm font-medium">{{ $article['category'] }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent leading-tight">
            {{ $article['title'] }}
        </h1>
        <div class="flex flex-wrap items-center justify-center gap-6 text-gray-300 mb-8">
            <div class="flex items-center">
                <img src="https://via.placeholder.com/40x40/3b82f6/ffffff?text=A" alt="Author" class="w-8 h-8 rounded-full mr-3">
                <span>{{ $article['author'] }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-calendar mr-2"></i>
                <span>{{ $article['date'] }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-clock mr-2"></i>
                <span>{{ $article['read_time'] }}</span>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Article Content -->
    <article class="prose prose-lg prose-invert max-w-none mb-12">
        <div class="bg-slate-800/30 backdrop-blur-sm rounded-2xl p-8 border border-slate-700/50">
            <p class="text-xl text-gray-300 leading-relaxed mb-8">
                Laravel 10 telah dirilis dengan berbagai fitur menarik yang akan meningkatkan produktivitas developer. Dalam artikel ini, kita akan membahas secara mendalam tentang fitur-fitur terbaru dan bagaimana mengimplementasikan best practices dalam pengembangan aplikasi web modern.
            </p>

            <h2 class="text-3xl font-bold text-white mb-6 mt-12">Fitur Terbaru Laravel 10</h2>
            
            <p class="text-gray-300 leading-relaxed mb-6">
                Laravel 10 membawa sejumlah peningkatan signifikan yang akan memudahkan developer dalam membangun aplikasi web yang robust dan scalable. Berikut adalah beberapa fitur utama yang perlu Anda ketahui:
            </p>

            <h3 class="text-2xl font-bold text-blue-400 mb-4">1. Process Interaction</h3>
            <p class="text-gray-300 leading-relaxed mb-6">
                Laravel 10 memperkenalkan Process Interaction yang memungkinkan Anda untuk berinteraksi dengan proses sistem operasi dengan cara yang lebih elegan dan mudah digunakan.
            </p>

            <div class="bg-slate-900/50 rounded-xl p-6 mb-8 border border-slate-700/30">
                <pre class="text-green-400 text-sm overflow-x-auto"><code>use Illuminate\Support\Facades\Process;

$result = Process::run('ls -la');

echo $result->output();</code></pre>
            </div>

            <h3 class="text-2xl font-bold text-blue-400 mb-4">2. Test Profiling</h3>
            <p class="text-gray-300 leading-relaxed mb-6">
                Fitur Test Profiling membantu developer mengidentifikasi test yang berjalan lambat, sehingga dapat mengoptimalkan performa test suite secara keseluruhan.
            </p>

            <div class="bg-blue-500/10 border-l-4 border-blue-500 p-6 mb-8">
                <p class="text-blue-300 font-medium mb-2">💡 Tips:</p>
                <p class="text-gray-300">Gunakan <code class="bg-slate-700 px-2 py-1 rounded text-blue-400">php artisan test --profile</code> untuk melihat profiling test Anda.</p>
            </div>

            <h3 class="text-2xl font-bold text-blue-400 mb-4">3. Improved Validation</h3>
            <p class="text-gray-300 leading-relaxed mb-6">
                Laravel 10 menyediakan validation rules yang lebih powerful dan fleksibel, termasuk nested array validation yang lebih mudah digunakan.
            </p>

            <img src="https://via.placeholder.com/800x400/1e293b/3b82f6?text=Laravel+Validation+Example" alt="Laravel Validation" class="w-full rounded-xl mb-8 border border-slate-700/30">

            <h2 class="text-3xl font-bold text-white mb-6 mt-12">Best Practices</h2>

            <h3 class="text-2xl font-bold text-purple-400 mb-4">1. Service Container & Dependency Injection</h3>
            <p class="text-gray-300 leading-relaxed mb-6">
                Manfaatkan Service Container Laravel untuk dependency injection yang clean dan testable. Ini akan membuat kode Anda lebih modular dan mudah di-maintain.
            </p>

            <h3 class="text-2xl font-bold text-purple-400 mb-4">2. Eloquent Relationships</h3>
            <p class="text-gray-300 leading-relaxed mb-6">
                Gunakan Eloquent relationships dengan bijak untuk menghindari N+1 query problem. Selalu gunakan eager loading ketika diperlukan.
            </p>

            <div class="bg-slate-900/50 rounded-xl p-6 mb-8 border border-slate-700/30">
                <pre class="text-green-400 text-sm overflow-x-auto"><code>// Good: Eager loading
$users = User::with('posts')->get();

// Bad: N+1 problem
$users = User::all();
foreach ($users as $user) {
    echo $user->posts->count();
}</code></pre>
            </div>

            <blockquote class="border-l-4 border-cyan-500 bg-cyan-500/10 p-6 mb-8">
                <p class="text-cyan-300 italic text-lg">
                    "Laravel 10 bukan hanya tentang fitur baru, tetapi juga tentang bagaimana kita dapat menulis kode yang lebih clean, maintainable, dan performant."
                </p>
                <footer class="text-cyan-400 mt-4">— Taylor Otwell, Creator of Laravel</footer>
            </blockquote>

            <h2 class="text-3xl font-bold text-white mb-6 mt-12">Kesimpulan</h2>
            <p class="text-gray-300 leading-relaxed mb-6">
                Laravel 10 membawa banyak peningkatan yang signifikan untuk developer. Dengan mengikuti best practices yang telah dibahas, Anda dapat membangun aplikasi web yang robust, scalable, dan mudah di-maintain.
            </p>

            <p class="text-gray-300 leading-relaxed">
                Jangan ragu untuk mulai mengeksplorasi fitur-fitur baru ini dalam proyek Anda. Happy coding!
            </p>
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
            @foreach($article['tags'] as $index => $tag)
                @php
                    $colors = ['blue', 'purple', 'green', 'cyan', 'yellow'];
                    $color = $colors[$index % count($colors)];
                @endphp
                <span class="px-4 py-2 bg-{{ $color }}-500/20 text-{{ $color }}-400 rounded-full text-sm hover:bg-{{ $color }}-500/30 transition-colors duration-300 cursor-pointer">{{ $tag }}</span>
            @endforeach
        </div>
    </div>

    <!-- Related Articles -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-white mb-8">Artikel Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedArticles as $related)
            <article class="bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 hover:border-blue-500/50 transition-all duration-300 hover:scale-105">
                <img src="{{ $related['image'] }}" alt="Related Article" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-white mb-2 hover:text-blue-400 transition-colors duration-300">
                        {{ $related['title'] }}
                    </h3>
                    <p class="text-gray-400 text-sm mb-3">{{ $related['excerpt'] }}</p>
                    <div class="text-xs text-gray-500">{{ $related['date'] }}</div>
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
    anchor.addEventListener('click', function (e) {
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
</script>
@endsection