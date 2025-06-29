<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RBC Project - Modern Digital Solutions</title>
    @yield('head')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    animation: {
                        'gradient': 'gradient 8s linear infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)'
                            },
                            '100%': {
                                boxShadow: '0 0 30px rgba(59, 130, 246, 0.8)'
                            }
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="min-h-screen text-white dark:text-white text-gray-900 transition-colors duration-300 flex flex-col">
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500 dark:bg-blue-500 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 dark:opacity-20 opacity-10 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500 dark:bg-purple-500 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 dark:opacity-20 opacity-10 animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-cyan-500 dark:bg-cyan-500 bg-cyan-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 dark:opacity-20 opacity-10 animate-float" style="animation-delay: 4s;"></div>
    </div>

    <!-- Header & Navigation -->
    <x-navbar />

    <!-- Konten Fullwidth (misal Hero Section) -->
    @yield('fullwidth')

    <!-- Main Content Area -->
    <main class="flex-1 relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer :services="$services" />

    <!-- Dark Mode Toggle -->
    <x-dark-toggle />

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('backdrop-blur-xl');
            } else {
                nav.classList.remove('backdrop-blur-xl');
            }
        });

        // Dark mode toggle functionality
        const darkToggle = document.getElementById('darkToggle');
        const html = document.documentElement;

        if (darkToggle) {
            darkToggle.addEventListener('click', function() {
                const icon = this.querySelector('i');

                // Toggle dark class on html element
                html.classList.toggle('dark');

                // Toggle icon
                if (html.classList.contains('dark')) {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                    localStorage.setItem('darkMode', 'true');
                } else {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                    localStorage.setItem('darkMode', 'false');
                }
            });

            // Load saved dark mode preference
            const savedDarkMode = localStorage.getItem('darkMode');
            if (savedDarkMode === 'false') {
                html.classList.remove('dark');
                darkToggle.querySelector('i').classList.remove('fa-moon');
                darkToggle.querySelector('i').classList.add('fa-sun');
            }
        }

        // Update cart count function
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

        // Update cart count on page load (only if user is authenticated)
        @auth
        if (document.querySelector('.cart-count')) {
            updateCartCount();
        }
        @endauth
    </script>
</body>

</html>