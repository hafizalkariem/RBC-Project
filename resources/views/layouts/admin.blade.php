<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - RBC Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .red-gradient {
            background: linear-gradient(135deg, #dc2626, #ef4444, #f87171);
        }

        .red-gradient-hover {
            background: linear-gradient(135deg, #b91c1c, #dc2626, #ef4444);
        }

        .glow-red {
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.6);
        }

        .glow-red-strong {
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.8), 0 0 60px rgba(239, 68, 68, 0.4);
        }

        .menu-item-hover:hover {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(248, 113, 113, 0.2));
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
            transform: translateX(4px);
        }

        .submenu-item-hover:hover {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15), rgba(248, 113, 113, 0.15));
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.2);
        }

        .header-gradient {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.95));
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(239, 68, 68, 0.3);
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.1);
        }

        .icon-glow {
            filter: drop-shadow(0 0 8px rgba(239, 68, 68, 0.6));
            color: #ef4444;
        }

        .title-glow {
            text-shadow: 0 0 20px rgba(239, 68, 68, 0.8);
            background: linear-gradient(135deg, #ef4444, #f87171, #fca5a5);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logout-btn:hover {
            color: #ef4444;
            filter: drop-shadow(0 0 10px rgba(239, 68, 68, 0.8));
            transform: scale(1.1);
        }

        .back-btn:hover {
            background: linear-gradient(135deg, rgba(147, 51, 234, 0.2), rgba(168, 85, 247, 0.2));
            box-shadow: 0 0 15px rgba(147, 51, 234, 0.3);
        }

        .animated-bg {
            animation: pulse-glow 3s ease-in-out infinite alternate;
        }

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
            }

            100% {
                box-shadow: 0 0 40px rgba(239, 68, 68, 0.6);
            }
        }
    </style>
</head>

<body class="bg-slate-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-80 glass-dark fixed h-full animated-bg overflow-y-auto">
            <div class="p-6" x-data="{ openMenus: {} }">
                <!-- Enhanced Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold title-glow mb-2">Admin Panel</h2>
                    <div class="w-full h-1 red-gradient rounded-full glow-red mb-2"></div>
                    <p class="text-sm text-gray-400">RBC Project Control</p>
                </div>

                <nav class="space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="menu-item-hover flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'text-white bg-red-500/20 border-l-4 border-red-500' : 'text-gray-300' }} hover:text-white rounded-lg transition-all duration-300">
                        <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-red-400' : 'icon-glow' }}"></i>Dashboard
                    </a>

                    <!-- Products -->
                    <a href="{{ route('admin.products') }}" class="menu-item-hover flex items-center px-4 py-3 {{ request()->routeIs('admin.products') ? 'text-white bg-red-500/20 border-l-4 border-red-500' : 'text-gray-300' }} hover:text-white rounded-lg transition-all duration-300">
                        <i class="fas fa-box mr-3 {{ request()->routeIs('admin.products') ? 'text-red-400' : 'icon-glow' }}"></i>Products
                    </a>

                    <!-- Transaksi -->
                    <div>
                        <button @click="openMenus.transactions = !openMenus.transactions" class="menu-item-hover w-full flex items-center justify-between px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                            <div class="flex items-center whitespace-nowrap">
                                <i class="fas fa-shopping-cart mr-3 icon-glow"></i>Transaksi
                            </div>
                            <i class="fas fa-chevron-down transition-transform icon-glow" :class="openMenus.transactions ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="openMenus.transactions" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="{{ route('admin.transactions.index') }}" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-list mr-2 text-red-400"></i>Semua Transaksi
                            </a>
                            <a href="{{ route('admin.transactions.index', ['status' => 'pending']) }}" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-clock mr-2 text-red-400"></i>Pending
                            </a>
                            <a href="{{ route('admin.transactions.index', ['status' => 'completed']) }}" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-check mr-2 text-red-400"></i>Completed
                            </a>
                        </div>
                    </div>

                    <!-- User Management -->
                    <div>
                        <button @click="openMenus.users = !openMenus.users" class="menu-item-hover w-full flex items-center justify-between px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                            <div class="flex items-center whitespace-nowrap">
                                <i class="fas fa-users mr-3 icon-glow"></i>User Management
                            </div>
                            <i class="fas fa-chevron-down transition-transform icon-glow" :class="openMenus.users ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="openMenus.users" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-list mr-2 text-red-400"></i>Semua User
                            </a>
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-user-shield mr-2 text-red-400"></i>Role & Permission
                            </a>
                        </div>
                    </div>

                    <!-- Blog Management -->
                    <div>
                        <button @click="openMenus.blog = !openMenus.blog" class="menu-item-hover w-full flex items-center justify-between px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                            <div class="flex items-center whitespace-nowrap">
                                <i class="fas fa-blog mr-3 icon-glow"></i>Blog Management
                            </div>
                            <i class="fas fa-chevron-down transition-transform icon-glow" :class="openMenus.blog ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="openMenus.blog" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-list mr-2 text-red-400"></i>Semua Post
                            </a>
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-plus mr-2 text-red-400"></i>Buat Post
                            </a>
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-folder mr-2 text-red-400"></i>Kategori
                            </a>
                        </div>
                    </div>

                    <!-- Developer Management -->
                    <div>
                        <button @click="openMenus.developer = !openMenus.developer" class="menu-item-hover w-full flex items-center justify-between px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                            <div class="flex items-center whitespace-nowrap">
                                <i class="fas fa-code mr-3 icon-glow"></i>Developer
                            </div>
                            <i class="fas fa-chevron-down transition-transform icon-glow" :class="openMenus.developer ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="openMenus.developer" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-list mr-2 text-red-400"></i>Daftar Developer
                            </a>
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-cogs mr-2 text-red-400"></i>Skills
                            </a>
                            <a href="#" class="submenu-item-hover block px-4 py-2 text-gray-400 hover:text-white rounded transition-all duration-300">
                                <i class="fas fa-briefcase mr-2 text-red-400"></i>Portfolio
                            </a>
                        </div>
                    </div>

                    <hr class="my-6 border-gray-700">

                    <!-- Back to Site -->
                    <a href="{{ route('home') }}" class="back-btn flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                        <i class="fas fa-arrow-left mr-3 text-purple-400"></i>Back to Site
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-80">
            <!-- Enhanced Top Bar -->
            <div class="header-gradient p-6 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 red-gradient rounded-full flex items-center justify-center glow-red">
                        <i class="fas fa-crown text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">@yield('title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-400">Welcome to your control center</p>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="text-gray-300 hover:text-red-400 transition-colors">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center glow-red">3</span>
                        </button>
                    </div>

                    <!-- User Info -->
                    <div class="flex items-center space-x-3">
                        <div class="text-right">
                            <p class="text-white font-medium">{{ Auth::user()->name ?? 'Admin User' }}</p>
                            <p class="text-sm text-gray-400">Administrator</p>
                        </div>
                        <div class="w-10 h-10 red-gradient rounded-full flex items-center justify-center glow-red overflow-hidden">
                            @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                            @else
                            <i class="fas fa-user text-white"></i>
                            @endif
                        </div>
                    </div>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn text-gray-300 hover:text-red-400 transition-all duration-300 p-2 rounded-lg">
                            <i class="fas fa-sign-out-alt text-xl"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>