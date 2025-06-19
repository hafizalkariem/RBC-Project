@extends('layouts.app')

@section('fullwidth')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- <script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                backdropBlur: {
                    xs: '2px',
                },
                animation: {
                    'float': 'float 6s ease-in-out infinite',
                    'glow': 'glow 2s ease-in-out infinite alternate',
                    'slide-up': 'slideUp 0.5s ease-out',
                    'fade-in': 'fadeIn 0.6s ease-out',
                },
                keyframes: {
                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0px)'
                        },
                        '50%': {
                            transform: 'translateY(-10px)'
                        },
                    },
                    glow: {
                        '0%': {
                            boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)'
                        },
                        '100%': {
                            boxShadow: '0 0 30px rgba(59, 130, 246, 0.8)'
                        },
                    },
                    slideUp: {
                        '0%': {
                            transform: 'translateY(20px)',
                            opacity: '0'
                        },
                        '100%': {
                            transform: 'translateY(0)',
                            opacity: '1'
                        },
                    },
                    fadeIn: {
                        '0%': {
                            opacity: '0'
                        },
                        '100%': {
                            opacity: '1'
                        },
                    }
                }
            }
        }
    }
</script> -->
<style>
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .glass-button {
        background: rgba(59, 130, 246, 0.3);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(59, 130, 246, 0.4);
    }

    .glass-button:hover {
        background: rgba(59, 130, 246, 0.5);
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .dark-gradient-bg {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

    .floating-shapes::before {
        content: '';
        position: absolute;
        top: 10%;
        right: 10%;
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(147, 51, 234, 0.1));
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .floating-shapes::after {
        content: '';
        position: absolute;
        bottom: 10%;
        left: 5%;
        width: 150px;
        height: 150px;
        background: linear-gradient(45deg, rgba(236, 72, 153, 0.1), rgba(59, 130, 246, 0.1));
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: float 6s ease-in-out infinite reverse;
    }

    .product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover {
        transform: translateY(-8px) scale(1.02);
    }

    input::placeholder,
    select {
        color: rgba(255, 255, 255, 0.7);
    }

    .category-pill {
        transition: all 0.3s ease;
    }

    .category-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }
</style>

<!-- <body class="dark:bg-gray-900 bg-gray-50 min-h-screen transition-colors duration-300"> -->
<!-- Background with floating shapes -->
<!-- <div class="fixed inset-0 dark-gradient-bg floating-shapes overflow-hidden">
    <div class="absolute top-20 left-20 w-32 h-32 bg-blue-500/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-purple-500/10 rounded-full blur-xl animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-pink-500/10 rounded-full blur-xl animate-pulse delay-500"></div>
</div> -->

<!-- Content -->
<div class="relative z-10">

    <!-- Main Content -->
    <section class="py-20 md:py-28">
        <div class="container mx-auto px-4">
            <!-- Title -->
            <div class="text-center mb-8 animate-fade-in">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-4">
                    Toko <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Source Code</span>
                </h2>
                <p class="text-xl text-white/80 max-w-2xl mx-auto">
                    Temukan source code berkualitas tinggi untuk proyek impian Anda
                </p>
            </div>

            <!-- Category Navigation -->
            <div class="mb-8 overflow-x-auto animate-slide-up">
                <nav class="flex gap-4 whitespace-nowrap p-4">
                    <button class="category-pill px-6 py-3 rounded-full glass-button text-white font-semibold hover:bg-blue-500/50 transition-all duration-300 active">
                        <i class="fas fa-star mr-2"></i>Semua
                    </button>
                    <button class="category-pill px-6 py-3 rounded-full glass text-white/90 hover:glass-button transition-all duration-300">
                        <i class="fas fa-chart-line mr-2"></i>Admin & Dashboard
                    </button>
                    <button class="category-pill px-6 py-3 rounded-full glass text-white/90 hover:glass-button transition-all duration-300">
                        <i class="fas fa-store mr-2"></i>Website UMKM
                    </button>
                    <button class="category-pill px-6 py-3 rounded-full glass text-white/90 hover:glass-button transition-all duration-300">
                        <i class="fas fa-user mr-2"></i>Portofolio Pribadi
                    </button>
                    <button class="category-pill px-6 py-3 rounded-full glass text-white/90 hover:glass-button transition-all duration-300">
                        <i class="fas fa-shopping-cart mr-2"></i>Toko Online
                    </button>
                </nav>
            </div>

            <!-- Filters & Search -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12 animate-slide-up">
                <!-- Search -->
                <div class="lg:col-span-2">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-white/60"></i>
                        <input type="text" placeholder="Cari produk amazing..."
                            class="w-full pl-12 pr-4 py-4 rounded-2xl glass text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300" />
                    </div>
                </div>

                <!-- Technology Filter -->
                <div class="relative">
                    <select class="w-full px-4 py-4 rounded-2xl glass text-white appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300">
                        <option value="" class="bg-gray-800">🛠️ Semua Teknologi</option>
                        <option value="html" class="bg-gray-800">HTML/CSS</option>
                        <option value="bootstrap" class="bg-gray-800">Bootstrap</option>
                        <option value="react" class="bg-gray-800">React</option>
                        <option value="vue" class="bg-gray-800">Vue.js</option>
                        <option value="laravel" class="bg-gray-800">Laravel</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-white/60 pointer-events-none"></i>
                </div>

                <!-- Price Filter -->
                <div class="relative">
                    <select class="w-full px-4 py-4 rounded-2xl glass text-white appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300">
                        <option value="" class="bg-gray-800">💰 Semua Harga</option>
                        <option value="1" class="bg-gray-800">Rp 0 - Rp 100.000</option>
                        <option value="2" class="bg-gray-800">Rp 100.000 - Rp 500.000</option>
                        <option value="3" class="bg-gray-800">Rp 500.000+</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-white/60 pointer-events-none"></i>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- Product Card 1 -->
                <div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-blue-500/20 animate-fade-in">
                    <div class="relative mb-6 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?w=400&h=250&fit=crop&crop=center"
                            alt="Dashboard Admin Modern"
                            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-green-500/80 text-white text-sm rounded-full backdrop-blur-sm">
                                <i class="fas fa-fire mr-1"></i>Hot
                            </span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold group-hover:text-blue-300 transition-colors">Dashboard Admin Modern</h3>
                        <p class="text-white/70 text-sm leading-relaxed">Dashboard responsif dengan UI/UX modern, chart interaktif, dan fitur lengkap untuk manajemen data.</p>

                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <i class="fab fa-html5 text-orange-400"></i>
                            <i class="fab fa-css3-alt text-blue-400"></i>
                            <i class="fab fa-js-square text-yellow-400"></i>
                            <span class="ml-2">HTML, CSS, JS</span>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <span class="text-2xl font-bold text-blue-300">Rp 250.000</span>
                                <span class="text-sm text-white/50 line-through ml-2">Rp 350.000</span>
                            </div>
                            <button class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-purple-500/20 animate-fade-in" style="animation-delay: 0.1s">
                    <div class="relative mb-6 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=250&fit=crop&crop=center"
                            alt="Website UMKM"
                            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-purple-500/80 text-white text-sm rounded-full backdrop-blur-sm">
                                <i class="fas fa-crown mr-1"></i>Premium
                            </span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold group-hover:text-purple-300 transition-colors">Website UMKM Complete</h3>
                        <p class="text-white/70 text-sm leading-relaxed">Template website lengkap untuk UMKM dengan sistem katalog, kontak, dan landing page yang converting.</p>

                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <i class="fab fa-bootstrap text-purple-400"></i>
                            <i class="fab fa-php text-blue-300"></i>
                            <span class="ml-2">Bootstrap, PHP</span>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <span class="text-2xl font-bold text-purple-300">Rp 180.000</span>
                            </div>
                            <button class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-pink-500/20 animate-fade-in" style="animation-delay: 0.2s">
                    <div class="relative mb-6 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=250&fit=crop&crop=center"
                            alt="Portfolio Personal"
                            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-pink-500/80 text-white text-sm rounded-full backdrop-blur-sm">
                                <i class="fas fa-star mr-1"></i>Best
                            </span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold group-hover:text-pink-300 transition-colors">Portfolio Personal Pro</h3>
                        <p class="text-white/70 text-sm leading-relaxed">Template portfolio modern dengan animasi smooth, responsive design, dan optimized untuk SEO.</p>

                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <i class="fab fa-react text-cyan-400"></i>
                            <i class="fab fa-sass text-pink-400"></i>
                            <span class="ml-2">React, SASS</span>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <span class="text-2xl font-bold text-pink-300">Rp 320.000</span>
                                <span class="text-sm text-white/50 line-through ml-2">Rp 450.000</span>
                            </div>
                            <button class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-green-500/20 animate-fade-in" style="animation-delay: 0.3s">
                    <div class="relative mb-6 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=250&fit=crop&crop=center"
                            alt="E-commerce Platform"
                            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-green-500/80 text-white text-sm rounded-full backdrop-blur-sm">
                                <i class="fas fa-bolt mr-1"></i>New
                            </span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold group-hover:text-green-300 transition-colors">E-commerce Full Stack</h3>
                        <p class="text-white/70 text-sm leading-relaxed">Platform e-commerce lengkap dengan payment gateway, admin panel, dan sistem inventory management.</p>

                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <i class="fab fa-laravel text-red-400"></i>
                            <i class="fab fa-vuejs text-green-400"></i>
                            <span class="ml-2">Laravel, Vue.js</span>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <span class="text-2xl font-bold text-green-300">Rp 750.000</span>
                            </div>
                            <button class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 5 -->
                <div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-yellow-500/20 animate-fade-in" style="animation-delay: 0.4s">
                    <div class="relative mb-6 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=400&h=250&fit=crop&crop=center"
                            alt="Landing Page"
                            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold group-hover:text-yellow-300 transition-colors">Landing Page Converter</h3>
                        <p class="text-white/70 text-sm leading-relaxed">Landing page high-converting dengan A/B testing ready dan analytics integration untuk bisnis apapun.</p>

                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <i class="fab fa-html5 text-orange-400"></i>
                            <i class="fab fa-js-square text-yellow-400"></i>
                            <span class="ml-2">HTML, JavaScript</span>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <span class="text-2xl font-bold text-yellow-300">Rp 150.000</span>
                            </div>
                            <button class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 6 -->
                <div class="product-card glass-card rounded-3xl p-6 shadow-2xl text-white group hover:shadow-indigo-500/20 animate-fade-in" style="animation-delay: 0.5s">
                    <div class="relative mb-6 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=250&fit=crop&crop=center"
                            alt="CRM System"
                            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold group-hover:text-indigo-300 transition-colors">CRM Management System</h3>
                        <p class="text-white/70 text-sm leading-relaxed">Sistem CRM lengkap untuk mengelola customer, sales pipeline, dan reporting dengan dashboard analytics.</p>

                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <i class="fab fa-node-js text-green-400"></i>
                            <i class="fab fa-react text-cyan-400"></i>
                            <span class="ml-2">Node.js, React</span>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <span class="text-2xl font-bold text-indigo-300">Rp 950.000</span>
                                <span class="text-sm text-white/50 line-through ml-2">Rp 1.200.000</span>
                            </div>
                            <button class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 hover:scale-105">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center animate-fade-in">
                <nav class="glass rounded-2xl p-2 shadow-lg">
                    <div class="flex items-center gap-2">
                        <button class="px-4 py-2 rounded-xl text-white hover:glass-button transition-all duration-300">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-4 py-2 rounded-xl glass-button text-white font-semibold">1</button>
                        <button class="px-4 py-2 rounded-xl text-white hover:glass-button transition-all duration-300">2</button>
                        <button class="px-4 py-2 rounded-xl text-white hover:glass-button transition-all duration-300">3</button>
                        <span class="px-2 text-white/60">...</span>
                        <button class="px-4 py-2 rounded-xl text-white hover:glass-button transition-all duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</div>

<script>
    // Dark mode toggle functionality
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');
    const html = document.documentElement;

    let isDark = true; // Start with dark mode

    darkModeToggle.addEventListener('click', () => {
        isDark = !isDark;

        if (isDark) {
            html.classList.add('dark');
            darkModeIcon.className = 'fas fa-moon';
        } else {
            html.classList.remove('dark');
            darkModeIcon.className = 'fas fa-sun';
        }
    });

    // Category filter functionality
    const categoryButtons = document.querySelectorAll('.category-pill');
    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            categoryButtons.forEach(btn => {
                btn.classList.remove('glass-button');
                btn.classList.add('glass');
            });

            // Add active class to clicked button
            button.classList.remove('glass');
            button.classList.add('glass-button');
        });
    });

    // Add hover effect to product cards
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Smooth scroll reveal animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all product cards
    productCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
</script>
<!-- </body> -->
@endsection