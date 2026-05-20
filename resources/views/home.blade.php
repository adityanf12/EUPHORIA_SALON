@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Banner -->
        <div class="bg-text-dark rounded-3xl p-8 md:p-12 shadow-soft relative overflow-hidden mb-12">
            <div class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1000&q=80')] bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-text-dark via-text-dark/80 to-transparent"></div>
            
            <div class="relative z-10">
                <h1 class="text-3xl md:text-4xl font-serif text-white mb-4">
                    Selamat datang kembali,<br>
                    <span class="text-soft-gold italic">{{ explode(' ', Auth::user()->name)[0] }}</span>
                </h1>
                <p class="text-cream/80 max-w-md mb-8">Siap untuk memanjakan diri hari ini? Jelajahi layanan kami dan buat janji temu dengan spesialis favoritmu.</p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('layanan') }}" class="btn-primary bg-soft-gold hover:bg-white text-text-dark font-medium px-6 py-3 rounded-full transition-colors flex items-center gap-2">
                        <i class="ph-bold ph-calendar-plus"></i> Reservasi Baru
                    </a>
                    <a href="{{ route('customer.history') }}" class="btn-outline border-cream text-cream hover:bg-cream hover:text-text-dark font-medium px-6 py-3 rounded-full transition-colors flex items-center gap-2">
                        <i class="ph-bold ph-clock-counter-clockwise"></i> Riwayat
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Categories -->
        <div class="mb-12">
            <h2 class="text-2xl font-serif text-text-dark mb-6">Kategori Perawatan</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <!-- Hair -->
                <a href="{{ route('layanan', ['kategori' => 'hair']) }}" class="group block relative rounded-2xl overflow-hidden aspect-square shadow-sm hover:shadow-soft transition-shadow">
                    <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=400&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white font-serif text-xl mb-1">Hair</h3>
                        <p class="text-cream/80 text-xs flex items-center gap-1 group-hover:text-soft-gold transition-colors">Lihat Layanan <i class="ph-bold ph-arrow-right"></i></p>
                    </div>
                </a>
                
                <!-- Nail -->
                <a href="{{ route('layanan', ['kategori' => 'nail']) }}" class="group block relative rounded-2xl overflow-hidden aspect-square shadow-sm hover:shadow-soft transition-shadow">
                    <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?w=400&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white font-serif text-xl mb-1">Nail Art</h3>
                        <p class="text-cream/80 text-xs flex items-center gap-1 group-hover:text-soft-gold transition-colors">Lihat Layanan <i class="ph-bold ph-arrow-right"></i></p>
                    </div>
                </a>
                
                <!-- Face -->
                <a href="{{ route('layanan', ['kategori' => 'face']) }}" class="group block relative rounded-2xl overflow-hidden aspect-square shadow-sm hover:shadow-soft transition-shadow">
                    <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=400&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white font-serif text-xl mb-1">Face & Beauty</h3>
                        <p class="text-cream/80 text-xs flex items-center gap-1 group-hover:text-soft-gold transition-colors">Lihat Layanan <i class="ph-bold ph-arrow-right"></i></p>
                    </div>
                </a>
                
                <!-- Relaxation -->
                <a href="{{ route('layanan', ['kategori' => 'relaxation']) }}" class="group block relative rounded-2xl overflow-hidden aspect-square shadow-sm hover:shadow-soft transition-shadow">
                    <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=400&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white font-serif text-xl mb-1">Relaxation</h3>
                        <p class="text-cream/80 text-xs flex items-center gap-1 group-hover:text-soft-gold transition-colors">Lihat Layanan <i class="ph-bold ph-arrow-right"></i></p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
