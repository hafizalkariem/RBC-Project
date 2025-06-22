<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<nav x-data="{ open: false }" class="glass-dark dark:glass-dark glass fixed w-full top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Brand Component -->
            <x-brand />

            <!-- Desktop/Tablet Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}"
                    class="flex items-center text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('home') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-blue-500 shadow-lg shadow-blue-500/50' : '' }}">
                    <i class="fas fa-home text-lg mr-0 md:mr-0 lg:mr-2 {{ request()->routeIs('home') ? 'text-blue-400' : '' }}"></i>
                    <span class="hidden lg:inline">Home</span>
                </a>
                <a href="{{ route('toko') }}"
                    class="flex items-center text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('toko') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-purple-500 shadow-lg shadow-purple-500/50' : '' }}">
                    <i class="fas fa-code text-lg mr-0 md:mr-0 lg:mr-2 {{ request()->routeIs('toko') ? 'text-purple-400' : '' }}"></i>
                    <span class="hidden lg:inline">Toko</span>
                </a>
                <a href="{{ route('service') }}"
                    class="flex items-center text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('service') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-green-500 shadow-lg shadow-green-500/50' : '' }}">
                    <i class="fas fa-globe text-lg mr-0 md:mr-0 lg:mr-2 {{ request()->routeIs('service') ? 'text-green-400' : '' }}"></i>
                    <span class="hidden lg:inline">Jasa</span>
                </a>
                <a href="{{ route('portofolio') }}"
                    class="flex items-center text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('portofolio') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-yellow-500 shadow-lg shadow-yellow-500/50' : '' }}">
                    <i class="fas fa-briefcase text-lg mr-0 md:mr-0 lg:mr-2 {{ request()->routeIs('portofolio') ? 'text-yellow-400' : '' }}"></i>
                    <span class="hidden lg:inline">Portofolio</span>
                </a>
                <a href="{{ route('blog') }}"
                    class="flex items-center text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('blog') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-red-500 shadow-lg shadow-red-500/50' : '' }}">
                    <i class="fas fa-blog text-lg mr-0 md:mr-0 lg:mr-2 {{ request()->routeIs('blog') ? 'text-red-400' : '' }}"></i>
                    <span class="hidden lg:inline">Blog</span>
                </a>
                <a href="{{ route('about') }}"
                    class="flex items-center text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('about') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-pink-500 shadow-lg shadow-pink-500/50' : '' }}">
                    <i class="fas fa-info-circle text-lg mr-0 md:mr-0 lg:mr-2 {{ request()->routeIs('about') ? 'text-pink-400' : '' }}"></i>
                    <span class="hidden lg:inline">About</span>
                </a>
            </div>

            <!-- Auth & Cart Buttons -->
            <div class="flex items-center space-x-4">
                @auth
                    <!-- Cart (hanya tampil saat login) -->
                    <button class="glass p-2 rounded-lg hover:bg-blue-500/20 transition-all duration-300 group">
                        <i class="fas fa-shopping-cart text-gray-300 dark:text-gray-300 text-gray-700 group-hover:text-white dark:group-hover:text-white group-hover:text-gray-900 text-base md:text-lg"></i>
                        <span class="ml-2 text-xs md:text-sm bg-blue-500 text-white px-2 py-1 rounded-full hidden md:inline">3</span>
                    </button>
                    
                    <!-- Profile Dropdown -->
                    <div x-data="{ profileOpen: false }" class="relative hidden md:block">
                        <button @click="profileOpen = !profileOpen" class="flex items-center space-x-2 glass p-2 rounded-lg hover:bg-blue-500/20 transition-all duration-300">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3b82f6&color=fff" alt="Profile" class="w-8 h-8 rounded-full">
                            <i class="fas fa-chevron-down text-gray-300 text-xs"></i>
                        </button>
                        
                        <div x-show="profileOpen" @click.away="profileOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-slate-900/95 rounded-lg shadow-lg py-2 z-50">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-blue-500/20 transition-colors duration-300">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-blue-500/20 transition-colors duration-300">
                                <i class="fas fa-cog mr-2"></i>Setting
                            </a>
                            @if(Auth::user()->roles()->whereIn('name', ['admin', 'developer'])->exists())
                                <hr class="my-2 border-gray-700">
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-purple-500/20 transition-colors duration-300">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                                </a>
                                <a href="/admin" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-blue-500/20 transition-colors duration-300">
                                    <i class="fas fa-blog mr-2"></i>Admin Blog
                                </a>
                            @endif
                            <hr class="my-2 border-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-300 hover:text-white hover:bg-red-500/20 transition-colors duration-300">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Auth Buttons (hanya tampil saat tidak login) -->
                    <a href="{{ route('login') }}"
                        class="glass px-4 py-2 rounded-lg text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 hover:bg-blue-500/20 transition-all duration-300 hidden md:inline text-xs md:text-sm lg:text-base">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-gradient-to-r from-blue-500 to-purple-600 px-4 py-2 rounded-lg text-white hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl hidden md:inline text-xs md:text-sm lg:text-base">
                        Daftar
                    </a>
                @endauth
                
                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden glass p-2 rounded-lg">
                    <i class="fas fa-bars text-gray-300 dark:text-gray-300 text-gray-700 text-lg"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Navigation -->
        <div x-show="open" x-transition class="md:hidden mt-2 bg-slate-900/90 dark:bg-slate-900/90 bg-white/90 rounded-xl shadow-lg px-4 py-6 space-y-4">
            <a href="{{ route('home') }}"
                class="block text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300 {{ request()->routeIs('home') ? 'font-bold text-white dark:text-white text-gray-900 border-b-2 border-blue-500' : '' }}">
                <i class="fas fa-home mr-2"></i>Home
            </a>
            <a href="{{ route('toko') }}" class="block text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300">
                <i class="fas fa-code mr-2"></i>Toko Source Code
            </a>
            <a href="{{ route('service') }}" class="block text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300">
                <i class="fas fa-globe mr-2"></i>Jasa Website
            </a>
            <a href="{{ route('portofolio') }}" class="block text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300">
                <i class="fas fa-briefcase mr-2"></i>Portofolio
            </a>
            <a href="{{ route('blog') }}" class="block text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300">
                <i class="fas fa-blog mr-2"></i>Blog
            </a>
            <a href="{{ route('about') }}" class="block text-gray-300 dark:text-gray-300 text-gray-700 hover:text-white dark:hover:text-white hover:text-gray-900 transition-colors duration-300">
                <i class="fas fa-info-circle mr-2"></i>Tentang Kami
            </a>
        </div>
    </div>
</nav>