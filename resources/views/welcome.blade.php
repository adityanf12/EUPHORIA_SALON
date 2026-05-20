@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-warm-white pt-24 pb-16 md:pt-32 md:pb-24 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-r from-warm-white via-cream/80 to-transparent z-10"></div>
        <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1600&q=80" alt="Salon Interior" class="w-full h-full object-cover object-right opacity-80">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
        <div class="max-w-2xl fade-in-up">
            <span class="text-soft-brown font-medium tracking-widest uppercase text-sm mb-4 block">Beauty & Wellness Retreat</span>
            <h1 class="text-5xl md:text-7xl font-serif text-text-dark leading-tight mb-6">
                Elegansi dalam<br>
                <span class="italic text-soft-gold">Setiap Sentuhan</span>
            </h1>
            <p class="text-lg text-text-mid mb-10 max-w-lg leading-relaxed">
                Nikmati pengalaman salon premium dengan standar internasional. Percayakan pesona Anda pada profesional kami yang berpengalaman.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('layanan') }}" class="btn-primary text-center px-8 py-4 rounded-full font-medium text-lg shadow-soft inline-block">
                    Reservasi Sekarang
                </a>
                <a href="#services" class="btn-outline text-center px-8 py-4 rounded-full font-medium text-lg inline-block bg-white/50 backdrop-blur-sm">
                    Lihat Layanan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section id="services" class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in-up">
            <span class="text-soft-brown font-medium tracking-widest uppercase text-sm mb-2 block">Layanan Kami</span>
            <h2 class="text-4xl font-serif text-text-dark">Pilihan Perawatan Premium</h2>
            <div class="w-24 h-1 bg-soft-gold mx-auto mt-6 rounded-full opacity-50"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Hair -->
            <a href="{{ route('layanan', ['kategori' => 'hair']) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=600&q=80" alt="Hair Services" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-serif font-medium mb-1">Hair Studio</h3>
                        <p class="text-sm text-cream/90 flex items-center gap-1">
                            Lihat Menu <i class="ph-bold ph-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </a>
            
            <!-- Nail -->
            <a href="{{ route('layanan', ['kategori' => 'nail']) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?w=600&q=80" alt="Nail Services" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-serif font-medium mb-1">Nail Art</h3>
                        <p class="text-sm text-cream/90 flex items-center gap-1">
                            Lihat Menu <i class="ph-bold ph-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </a>

            <!-- Face -->
            <a href="{{ route('layanan', ['kategori' => 'face']) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=600&q=80" alt="Face Services" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-serif font-medium mb-1">Face Beauty</h3>
                        <p class="text-sm text-cream/90 flex items-center gap-1">
                            Lihat Menu <i class="ph-bold ph-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </a>

            <!-- Relaxation -->
            <a href="{{ route('layanan', ['kategori' => 'relaxation']) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-64 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=600&q=80" alt="Relaxation" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-serif font-medium mb-1">Relaxation</h3>
                        <p class="text-sm text-cream/90 flex items-center gap-1">
                            Lihat Menu <i class="ph-bold ph-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 text-soft-brown font-medium hover:text-text-dark transition-colors border-b border-soft-brown pb-1">
                Jelajahi Semua Layanan Kami <i class="ph-bold ph-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Featured Stylists -->
<section class="py-24 bg-warm-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 fade-in-up">
            <div class="max-w-2xl">
                <span class="text-soft-brown font-medium tracking-widest uppercase text-sm mb-2 block">Tim Ahli</span>
                <h2 class="text-4xl font-serif text-text-dark">Profesional Kami</h2>
                <p class="mt-4 text-text-mid text-lg">Ditangani langsung oleh para expert bersertifikat dengan jam terbang tinggi di industri kecantikan.</p>
            </div>
            <a href="{{ route('layanan') }}" class="hidden md:inline-flex items-center gap-2 text-soft-brown hover:text-text-dark font-medium transition-colors">
                Buat Janji Temu <i class="ph-bold ph-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProfesional as $prof)
                <div class="bg-cream rounded-2xl overflow-hidden shadow-sm hover:shadow-soft transition-shadow">
                    <div class="aspect-w-3 aspect-h-4 bg-gray-200">
                        @if($prof->foto)
                            <img src="{{ $prof->foto }}" alt="{{ $prof->nama }}" class="w-full h-64 object-cover object-top grayscale hover:grayscale-0 transition-all duration-500">
                        @else
                            <div class="w-full h-64 bg-soft-beige flex items-center justify-center">
                                <i class="ph-light ph-user text-6xl text-soft-brown opacity-50"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-serif text-xl text-text-dark font-semibold">{{ $prof->nama }}</h3>
                        <p class="text-soft-brown text-sm mb-3">{{ $prof->spesialisasi_label }}</p>
                        <div class="flex items-center justify-center gap-1 text-soft-gold text-sm">
                            <i class="ph-fill ph-star"></i>
                            <span class="text-text-mid font-medium ml-1">{{ number_format($prof->rating, 1) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Section -->
@if($galeri->count() > 0)
<section class="py-20 bg-text-dark overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="text-center">
            <span class="text-soft-gold font-medium tracking-widest uppercase text-sm mb-2 block">Inspirasi Gaya</span>
            <h2 class="text-4xl font-serif text-white">Galeri Euphoria</h2>
        </div>
    </div>
    
    <!-- Alpine Carousel for Gallery -->
    <div x-data="{ 
            scrollLeft() { $refs.slider.scrollBy({left: -300, behavior: 'smooth'}) },
            scrollRight() { $refs.slider.scrollBy({left: 300, behavior: 'smooth'}) }
         }" 
         class="relative max-w-[1400px] mx-auto px-4">
         
        <button @click="scrollLeft()" class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-colors border border-white/20">
            <i class="ph-bold ph-caret-left text-xl"></i>
        </button>
        
        <button @click="scrollRight()" class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-colors border border-white/20">
            <i class="ph-bold ph-caret-right text-xl"></i>
        </button>

        <div x-ref="slider" class="flex gap-6 overflow-x-auto snap-x snap-mandatory scrollbar-hide py-4" style="scrollbar-width: none; -ms-overflow-style: none;">
            @foreach($galeri as $item)
                <div class="flex-none w-72 md:w-80 snap-center group">
                    <div class="relative rounded-2xl overflow-hidden aspect-[3/4]">
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <h4 class="text-white font-serif text-lg mb-1">{{ $item->judul }}</h4>
                            <p class="text-cream/80 text-sm">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Testimonials -->
<section class="py-24 bg-cream relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-nude-pink rounded-full mix-blend-multiply filter blur-3xl opacity-30 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-soft-gold rounded-full mix-blend-multiply filter blur-3xl opacity-20 translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-serif text-text-dark">Apa Kata Mereka</h2>
            <div class="w-24 h-1 bg-soft-brown mx-auto mt-6 rounded-full opacity-30"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials->take(3) as $testi)
                <div class="bg-white p-8 rounded-3xl shadow-soft relative">
                    <i class="ph-fill ph-quotes text-4xl text-cream absolute top-6 right-8"></i>
                    <div class="flex text-soft-gold text-sm mb-4">
                        {!! $testi->stars !!}
                    </div>
                    <p class="text-text-mid italic mb-6 leading-relaxed relative z-10">
                        "{{ $testi->komentar }}"
                    </p>
                    <div class="flex items-center gap-4 border-t border-cream pt-4 mt-auto">
                        <img src="{{ $testi->avatar }}" alt="{{ $testi->nama }}" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-semibold text-text-dark text-sm">{{ $testi->nama }}</h4>
                            @if($testi->layanan_label)
                                <p class="text-xs text-soft-brown">{{ $testi->layanan_label }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-warm-white text-center px-4">
    <div class="max-w-3xl mx-auto bg-text-dark rounded-3xl p-12 md:p-16 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1000&q=80')] bg-cover bg-center"></div>
        <div class="relative z-10">
            <h2 class="text-3xl md:text-5xl font-serif text-white mb-6">Siap Untuk Tampil Memukau?</h2>
            <p class="text-cream/80 text-lg mb-10 max-w-xl mx-auto">Booking sesi perawatanmu sekarang dan dapatkan pengalaman salon premium yang tak terlupakan.</p>
            <a href="{{ route('layanan') }}" class="inline-block bg-soft-gold text-text-dark font-semibold px-10 py-4 rounded-full text-lg hover:bg-white transition-colors shadow-lg transform hover:-translate-y-1">
                Reservasi Jadwal
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>
@endpush
