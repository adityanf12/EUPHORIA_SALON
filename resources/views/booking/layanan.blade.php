@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-20">
    
    <!-- Page Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="text-center fade-in-up">
            <h1 class="text-4xl md:text-5xl font-serif text-text-dark mb-4">Pilih Perawatan Anda</h1>
            <p class="text-text-mid text-lg max-w-2xl mx-auto">Tentukan layanan yang Anda inginkan. Kami memastikan setiap sentuhan memberikan hasil yang memukau.</p>
            <div class="w-16 h-1 bg-soft-gold mx-auto mt-6 rounded-full opacity-50"></div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('layanan') }}" class="px-6 py-2.5 rounded-full text-sm font-medium transition-all {{ !$kategori ? 'bg-soft-brown text-white shadow-md' : 'bg-cream text-soft-brown hover:bg-soft-beige' }}">
                Semua Layanan
            </a>
            @foreach($kategoris as $kat)
                <a href="{{ route('layanan', ['kategori' => $kat]) }}" class="px-6 py-2.5 rounded-full text-sm font-medium transition-all {{ $kategori == $kat ? 'bg-soft-brown text-white shadow-md' : 'bg-cream text-soft-brown hover:bg-soft-beige' }}">
                    {{ ucfirst($kat) }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Services Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($layanan->isEmpty())
            <div class="text-center py-20 bg-cream rounded-3xl border border-soft-beige/50">
                <i class="ph-light ph-flower-lotus text-6xl text-soft-beige mb-4"></i>
                <h3 class="text-xl font-serif text-text-dark mb-2">Layanan Tidak Ditemukan</h3>
                <p class="text-text-mid">Belum ada layanan untuk kategori ini.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($layanan as $l)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-soft transition-all duration-300 flex flex-col group border border-cream h-full">
                        
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden bg-gray-100">
                            @if($l->gambar)
                                <img src="{{ $l->gambar }}" alt="{{ $l->nama_layanan }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-soft-beige">
                                    <i class="ph-light ph-image text-4xl"></i>
                                </div>
                            @endif
                            
                            <!-- Badges -->
                            <div class="absolute top-3 right-3 flex flex-col gap-2 items-end">
                                <span class="bg-white/90 backdrop-blur-sm text-soft-brown text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                    {{ $l->kategori_label }}
                                </span>
                                @if(!$l->isAvailable())
                                    <span class="bg-red-500/90 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full shadow-sm flex items-center gap-1">
                                        <i class="ph-fill ph-x-circle"></i> Tidak Tersedia
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex justify-between items-start mb-2 gap-4">
                                <h3 class="font-serif text-xl font-semibold text-text-dark leading-tight">{{ $l->nama_layanan }}</h3>
                            </div>
                            
                            <p class="text-soft-brown font-semibold text-lg mb-3">{{ $l->harga_formatted }}</p>
                            
                            <p class="text-text-mid text-sm mb-6 line-clamp-2 flex-grow">{{ $l->deskripsi }}</p>
                            
                            <!-- Footer & Action -->
                            <div class="pt-4 border-t border-cream flex items-center justify-between mt-auto">
                                <div class="flex items-center text-xs text-text-mid gap-1">
                                    <i class="ph-fill ph-clock text-soft-gold"></i>
                                    {{ $l->durasi_formatted }}
                                </div>
                                
                                @if($l->isAvailable())
                                    <a href="{{ route('booking.profesional', $l->id) }}" class="text-sm font-medium text-soft-brown bg-cream hover:bg-soft-brown hover:text-white px-4 py-2 rounded-full transition-colors inline-flex items-center gap-1 group-hover:shadow-sm">
                                        Pilih <i class="ph-bold ph-arrow-right text-xs"></i>
                                    </a>
                                @else
                                    <button disabled class="text-sm font-medium text-gray-400 bg-gray-100 px-4 py-2 rounded-full cursor-not-allowed">
                                        Tutup
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
