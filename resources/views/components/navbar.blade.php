<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<nav x-data="{ open: false }" class="glass-dark fixed w-full top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Brand Component -->
            <x-brand />

            <!-- Desktop/Tablet Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}"
                    class="flex items-center text-gray-300 hover:text-white transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl {{ request()->routeIs('home') ? 'font-bold text-white border-b-2 border-blue-500' : '' }}">
                    <i class="fas fa-home text-lg mr-0 md:mr-0 lg:mr-2"></i>
                    <span class="hidden lg:inline">Home</span>
                </a>
                <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl">
                    <i class="fas fa-code text-lg mr-0 md:mr-0 lg:mr-2"></i>
                    <span class="hidden lg:inline">Toko</span>
                </a>
                <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl">
                    <i class="fas fa-globe text-lg mr-0 md:mr-0 lg:mr-2"></i>
                    <span class="hidden lg:inline">Jasa</span>
                </a>
                <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl">
                    <i class="fas fa-briefcase text-lg mr-0 md:mr-0 lg:mr-2"></i>
                    <span class="hidden lg:inline">Portofolio</span>
                </a>
                <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl">
                    <i class="fas fa-blog text-lg mr-0 md:mr-0 lg:mr-2"></i>
                    <span class="hidden lg:inline">Blog</span>
                </a>
                <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300 hover:scale-105 transform text-sm md:text-base lg:text-lg xl:text-xl">
                    <i class="fas fa-info-circle text-lg mr-0 md:mr-0 lg:mr-2"></i>
                    <span class="hidden lg:inline">About</span>
                </a>
            </div>

            <!-- Auth & Cart Buttons -->
            <div class="flex items-center space-x-4">
                <!-- Cart -->
                <button class="glass p-2 rounded-lg hover:bg-blue-500/20 transition-all duration-300 group">
                    <i class="fas fa-shopping-cart text-gray-300 group-hover:text-white text-base md:text-lg"></i>
                    <span class="ml-2 text-xs md:text-sm bg-blue-500 text-white px-2 py-1 rounded-full hidden md:inline">3</span>
                </button>
                <!-- Auth Buttons -->
                <button class="glass px-4 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-blue-500/20 transition-all duration-300 hidden md:inline text-xs md:text-sm lg:text-base">
                    Masuk
                </button>
                <button class="bg-gradient-to-r from-blue-500 to-purple-600 px-4 py-2 rounded-lg text-white hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl hidden md:inline text-xs md:text-sm lg:text-base">
                    Daftar
                </button>
                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden glass p-2 rounded-lg">
                    <i class="fas fa-bars text-gray-300 text-lg"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Navigation -->
        <div x-show="open" x-transition class="md:hidden mt-2 bg-slate-900/90 rounded-xl shadow-lg px-4 py-6 space-y-4">
            <a href="{{ route('home') }}"
                class="block text-gray-300 hover:text-white transition-colors duration-300 {{ request()->routeIs('home') ? 'font-bold text-white border-b-2 border-blue-500' : '' }}">
                <i class="fas fa-home mr-2"></i>Home
            </a>
            <a href="#" class="block text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-code mr-2"></i>Toko Source Code
            </a>
            <a href="#" class="block text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-globe mr-2"></i>Jasa Website
            </a>
            <a href="#" class="block text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-briefcase mr-2"></i>Portofolio
            </a>
            <a href="#" class="block text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-blog mr-2"></i>Blog
            </a>
            <a href="#" class="block text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-info-circle mr-2"></i>Tentang Kami
            </a>
        </div>
    </div>
</nav>