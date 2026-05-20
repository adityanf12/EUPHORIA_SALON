<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Euphoria — Luxury Beauty & Wellness')</title>
    
    <!-- Fonts: Playfair Display & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Tailwind CSS (Play CDN for rapid redesign) -->
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
                    boxShadow: {
                        'soft': '0 4px 20px rgba(139, 107, 97, 0.08)',
                        'glow': '0 0 20px rgba(217, 184, 168, 0.4)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: theme('colors.warm-white');
            color: theme('colors.text-mid');
            -webkit-font-smoothing: antialiased;
        }
        h1, h2, h3, h4, h5, h6 {
            color: theme('colors.text-dark');
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: theme('colors.cream'); }
        ::-webkit-scrollbar-thumb { background: theme('colors.soft-beige'); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: theme('colors.nude-pink'); }

        .glass-nav {
            background: rgba(255, 253, 251, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(232, 216, 200, 0.3);
        }

        .btn-primary {
            background-color: theme('colors.soft-brown');
            color: white;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: theme('colors.text-dark');
            transform: translateY(-2px);
            box-shadow: theme('boxShadow.soft');
        }

        .btn-outline {
            border: 1px solid theme('colors.soft-brown');
            color: theme('colors.soft-brown');
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background-color: theme('colors.cream');
            transform: translateY(-2px);
        }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }
        
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{ 'glass-nav shadow-sm': scrolled, 'bg-transparent': !scrolled }"
         class="fixed w-full z-50 transition-all duration-300 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="font-serif text-2xl font-bold text-text-dark tracking-wide flex items-center gap-2">
                        <i class="ph-light ph-flower-lotus text-soft-gold text-3xl"></i>
                        Euphoria
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-text-mid hover:text-soft-brown transition-colors text-sm font-medium tracking-wide">Home</a>
                    <a href="{{ route('layanan') }}" class="text-text-mid hover:text-soft-brown transition-colors text-sm font-medium tracking-wide">Layanan</a>
                    
                    @guest
                        <a href="{{ route('login') }}" class="text-text-mid hover:text-soft-brown transition-colors text-sm font-medium">Masuk</a>
                        <a href="{{ route('register') }}" class="btn-primary px-6 py-2 rounded-full text-sm font-medium">Daftar</a>
                    @else
                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center gap-2 text-text-dark font-medium focus:outline-none">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=D9B8A8&color=8B6B61" class="w-8 h-8 rounded-full border border-soft-beige">
                                <span class="text-sm">{{ explode(' ', Auth::user()->name)[0] }}</span>
                                <i class="ph ph-caret-down text-xs"></i>
                            </button>
                            
                            <div x-show="dropdownOpen" x-transition.opacity
                                 class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-soft border border-cream py-2 z-50" x-cloak>
                                
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-text-mid hover:bg-cream hover:text-soft-brown transition-colors">
                                        <i class="ph ph-squares-four mr-2"></i> Admin Dashboard
                                    </a>
                                    <div class="border-t border-cream my-1"></div>
                                @endif
                                
                                <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm text-text-mid hover:bg-cream hover:text-soft-brown transition-colors">
                                    <i class="ph ph-user mr-2"></i> Profil Saya
                                </a>
                                <a href="{{ route('customer.history') }}" class="block px-4 py-2 text-sm text-text-mid hover:bg-cream hover:text-soft-brown transition-colors">
                                    <i class="ph ph-clock-counter-clockwise mr-2"></i> Riwayat Reservasi
                                </a>
                                
                                <div class="border-t border-cream my-1"></div>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                        <i class="ph ph-sign-out mr-2"></i> Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-text-dark focus:outline-none">
                        <i class="ph ph-list text-2xl" x-show="!mobileMenuOpen"></i>
                        <i class="ph ph-x text-2xl" x-show="mobileMenuOpen" x-cloak></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition x-cloak class="md:hidden bg-warm-white border-b border-cream absolute w-full left-0 top-full shadow-soft">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-3 rounded-md text-base font-medium text-text-dark hover:bg-cream">Home</a>
                <a href="{{ route('layanan') }}" class="block px-3 py-3 rounded-md text-base font-medium text-text-dark hover:bg-cream">Layanan</a>
                
                <div class="border-t border-cream my-2"></div>
                
                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-3 rounded-md text-base font-medium text-text-dark hover:bg-cream">Masuk</a>
                    <a href="{{ route('register') }}" class="block px-3 py-3 rounded-md text-base font-medium text-soft-brown bg-cream mt-2 text-center">Daftar Sekarang</a>
                @else
                    <div class="px-3 py-2 flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=D9B8A8&color=8B6B61" class="w-10 h-10 rounded-full">
                        <div>
                            <div class="text-text-dark font-medium">{{ Auth::user()->name }}</div>
                            <div class="text-text-mid text-sm">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base text-text-mid hover:bg-cream hover:text-soft-brown">Admin Dashboard</a>
                    @endif
                    <a href="{{ route('customer.profile') }}" class="block px-3 py-2 rounded-md text-base text-text-mid hover:bg-cream hover:text-soft-brown">Profil Saya</a>
                    <a href="{{ route('customer.history') }}" class="block px-3 py-2 rounded-md text-base text-text-mid hover:bg-cream hover:text-soft-brown">Riwayat Reservasi</a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full text-left block px-3 py-2 rounded-md text-base text-red-500 hover:bg-red-50">Keluar</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Toast Notifications -->
    <div class="fixed top-24 right-4 z-50 flex flex-col gap-2">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                 x-transition.duration.500ms
                 class="bg-white border-l-4 border-soft-gold p-4 rounded shadow-soft flex items-start gap-3 max-w-md">
                <i class="ph-fill ph-check-circle text-soft-gold text-xl mt-0.5"></i>
                <div>
                    <h4 class="text-sm font-semibold text-text-dark">Berhasil</h4>
                    <p class="text-sm text-text-mid mt-1">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="ml-auto text-gray-400 hover:text-gray-600"><i class="ph ph-x"></i></button>
            </div>
        @endif

        @if(session('error') || $errors->any())
            <div x-data="{ show: true }" x-show="show" 
                 x-transition.duration.500ms
                 class="bg-white border-l-4 border-red-400 p-4 rounded shadow-soft flex items-start gap-3 max-w-md">
                <i class="ph-fill ph-warning-circle text-red-400 text-xl mt-0.5"></i>
                <div>
                    <h4 class="text-sm font-semibold text-text-dark">Terjadi Kesalahan</h4>
                    <div class="text-sm text-text-mid mt-1">
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
                <button @click="show = false" class="ml-auto text-gray-400 hover:text-gray-600"><i class="ph ph-x"></i></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-cream pt-16 pb-8 border-t border-soft-beige mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-1">
                    <a href="{{ route('home') }}" class="font-serif text-2xl font-bold text-text-dark tracking-wide flex items-center gap-2 mb-4">
                        <i class="ph-light ph-flower-lotus text-soft-gold text-3xl"></i>
                        Euphoria
                    </a>
                    <p class="text-sm text-text-mid leading-relaxed">
                        Destinasi kecantikan premium untuk perawatan rambut, kuku, dan wajah. Temukan versi terbaik dirimu bersama tim profesional kami.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown hover:bg-soft-brown hover:text-white transition-colors shadow-sm">
                            <i class="ph-fill ph-instagram-logo text-xl"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown hover:bg-soft-brown hover:text-white transition-colors shadow-sm">
                            <i class="ph-fill ph-tiktok-logo text-xl"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown hover:bg-soft-brown hover:text-white transition-colors shadow-sm">
                            <i class="ph-fill ph-whatsapp-logo text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-serif font-semibold text-text-dark mb-4 text-lg">Layanan Kami</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('layanan', ['kategori' => 'hair']) }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Hair Styling & Care</a></li>
                        <li><a href="{{ route('layanan', ['kategori' => 'nail']) }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Nail Art & Spa</a></li>
                        <li><a href="{{ route('layanan', ['kategori' => 'face']) }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Facial Treatment</a></li>
                        <li><a href="{{ route('layanan', ['kategori' => 'relaxation']) }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Body Relaxation</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-serif font-semibold text-text-dark mb-4 text-lg">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Beranda</a></li>
                        <li><a href="{{ route('layanan') }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Semua Layanan</a></li>
                        @guest
                            <li><a href="{{ route('login') }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Masuk</a></li>
                        @else
                            <li><a href="{{ route('customer.history') }}" class="text-sm text-text-mid hover:text-soft-brown transition-colors">Riwayat Reservasi</a></li>
                        @endguest
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-serif font-semibold text-text-dark mb-4 text-lg">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="ph-fill ph-map-pin text-soft-gold text-xl mt-0.5"></i>
                            <span class="text-sm text-text-mid">Jl. Kemang Raya No. 88,<br>Jakarta Selatan 12730</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph-fill ph-phone text-soft-gold text-xl"></i>
                            <span class="text-sm text-text-mid">+62 811-2345-6789</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph-fill ph-envelope-simple text-soft-gold text-xl"></i>
                            <span class="text-sm text-text-mid">hello@euphoria.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-soft-beige text-center">
                <p class="text-sm text-text-mid">&copy; {{ date('Y') }} Euphoria. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
