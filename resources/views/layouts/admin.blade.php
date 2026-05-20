<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard — Euphoria')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Alpine.js & Icons -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#F8F3EE',
                        'warm-white': '#FFFDFB',
                        'soft-beige': '#E8D8C8',
                        'nude-pink': '#D9B8A8',
                        'soft-brown': '#8B6B61',
                        'soft-gold': '#C6A27E',
                        'text-dark': '#3D2C2C',
                        'text-mid': '#6B5B5B',
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['"Poppins"', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        body { background-color: #F9FAFB; font-family: 'Poppins', sans-serif; color: #374151; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; color: #111827; }
        [x-cloak] { display: none !important; }
        
        .nav-link.active {
            background-color: theme('colors.cream');
            color: theme('colors.soft-brown');
            border-right: 3px solid theme('colors.soft-brown');
        }
    </style>
    @stack('styles')
</head>
<body class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Sidebar Backdrop -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-gray-900 bg-opacity-50 lg:hidden" @click="sidebarOpen = false" x-cloak></div>

    <!-- Sidebar -->
    <aside :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 flex flex-col">
        
        <div class="flex items-center justify-center h-20 border-b border-gray-100 px-6">
            <a href="{{ route('admin.dashboard') }}" class="font-serif text-2xl font-bold text-text-dark flex items-center gap-2">
                <i class="ph-light ph-flower-lotus text-soft-gold text-3xl"></i>
                AdminPanel
            </a>
        </div>

        <div class="overflow-y-auto flex-1 py-4">
            <nav class="space-y-1 px-3">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-4">Utama</p>
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-squares-four text-xl mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.reservasi.index') }}" class="nav-link {{ request()->routeIs('admin.reservasi.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-calendar-check text-xl mr-3 {{ request()->routeIs('admin.reservasi.*') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Reservasi
                </a>

                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">Master Data</p>
                <a href="{{ route('admin.layanan.index') }}" class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-sparkle text-xl mr-3 {{ request()->routeIs('admin.layanan.*') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Layanan
                </a>
                
                <a href="{{ route('admin.profesional.index') }}" class="nav-link {{ request()->routeIs('admin.profesional.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-users text-xl mr-3 {{ request()->routeIs('admin.profesional.*') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Profesional
                </a>
                
                <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-user-list text-xl mr-3 {{ request()->routeIs('admin.customers.*') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Pelanggan
                </a>

                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">Konten</p>
                <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-image text-xl mr-3 {{ request()->routeIs('admin.galeri.*') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Galeri
                </a>
                
                <a href="{{ route('admin.testimonial.index') }}" class="nav-link {{ request()->routeIs('admin.testimonial.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-chat-centered-text text-xl mr-3 {{ request()->routeIs('admin.testimonial.*') ? 'text-soft-brown' : 'text-gray-400' }}"></i>
                    Testimonial
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-100">
            <a href="{{ route('home') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors" target="_blank">
                <i class="ph ph-arrow-square-out text-xl mr-3 text-gray-400"></i>
                Lihat Website
            </a>
        </div>
    </aside>

    <!-- Main Content wrapper -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- Top Navbar -->
        <header class="flex items-center justify-between h-20 px-6 bg-white border-b border-gray-200 lg:justify-end">
            <!-- Mobile Menu Button -->
            <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                <i class="ph ph-list text-2xl"></i>
            </button>

            <!-- User Menu -->
            <div class="flex items-center" x-data="{ dropdownOpen: false }">
                <div class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=D9B8A8&color=8B6B61" class="w-10 h-10 rounded-full border border-gray-200">
                        <i class="ph ph-caret-down text-gray-400 text-sm"></i>
                    </button>

                    <div x-show="dropdownOpen" x-transition x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10 border border-gray-100">
                        <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                        <div class="border-t border-gray-100"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            
            <!-- Alerts -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow-sm flex items-start gap-3">
                    <i class="ph-fill ph-check-circle text-green-500 text-xl mt-0.5"></i>
                    <div>
                        <h4 class="text-sm font-medium text-green-800">Berhasil</h4>
                        <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error') || $errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm flex items-start gap-3">
                    <i class="ph-fill ph-warning-circle text-red-500 text-xl mt-0.5"></i>
                    <div>
                        <h4 class="text-sm font-medium text-red-800">Terjadi Kesalahan</h4>
                        <div class="text-sm text-red-700 mt-1">
                            @if(session('error'))
                                <p>{{ session('error') }}</p>
                            @endif
                            @if($errors->any())
                                <ul class="list-disc pl-4 mt-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
            
        </main>
    </div>

    @stack('scripts')
</body>
</html>
