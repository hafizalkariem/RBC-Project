@extends('layouts.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('fullwidth')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            <x-toko.kategori_navigation :categories="$categories" />

            <!-- Filters & Search -->
            <x-toko.filter_search :technologies="$technologies" />

            <!-- Products Grid -->
            <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse($products as $index => $product)
                <x-toko.product-card :product="$product" :index="$index" />
                @empty
                <x-toko.empty-state />
                @endforelse
            </div>



            <!-- Pagination -->
            <x-toko.pagination :products="$products" />
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Note: Dark mode toggle is handled in main layout

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

    // Live Search Functionality
    let searchTimeout;
    const liveSearch = document.getElementById('live-search');
    const technologyFilter = document.getElementById('technology-filter');
    const clearFilters = document.getElementById('clear-filters');
    const productsGrid = document.getElementById('products-grid');

    function performSearch() {
        const searchQuery = liveSearch ? liveSearch.value : '';
        const technology = technologyFilter ? technologyFilter.value : '';
        const category = new URLSearchParams(window.location.search).get('category') || '';
        
        console.log('Performing search:', { searchQuery, technology, category });
        
        fetch(`/toko/search?search=${encodeURIComponent(searchQuery)}&technology=${encodeURIComponent(technology)}&category=${encodeURIComponent(category)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Search result:', data);
            if (productsGrid && data.html) {
                productsGrid.innerHTML = data.html;
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            if (productsGrid) {
                productsGrid.innerHTML = '<div class="col-span-full text-center py-12"><div class="glass-card rounded-3xl p-8 text-white"><h3 class="text-xl font-bold mb-2">Error</h3><p class="text-white/70">Terjadi kesalahan saat mencari produk</p></div></div>';
            }
        });
    }

    if (liveSearch) {
        liveSearch.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 300);
        });
    }

    if (technologyFilter) {
        technologyFilter.addEventListener('change', performSearch);
    }

    if (clearFilters) {
        clearFilters.addEventListener('click', function() {
            if (liveSearch) liveSearch.value = '';
            if (technologyFilter) technologyFilter.value = '';
            performSearch();
        });
    }

    // Load cart count on page load
    updateCartCount();
});

// Add to cart function
function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartCount();
            // Show success message
            showNotification('Product added to cart!', 'success');
        } else if (data.error) {
            showNotification(data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Please login first', 'error');
    });
}

// Update cart count
function updateCartCount() {
    fetch('/cart/count')
    .then(response => response.json())
    .then(data => {
        const cartBadge = document.querySelector('.cart-count');
        if (cartBadge) {
            cartBadge.textContent = data.count;
            cartBadge.style.display = data.count > 0 ? 'inline' : 'none';
        }
    })
    .catch(error => console.error('Error updating cart count:', error));
}

// Show notification
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg text-white z-50 transition-all duration-300 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}
</script>
<!-- </body> -->
@endsection