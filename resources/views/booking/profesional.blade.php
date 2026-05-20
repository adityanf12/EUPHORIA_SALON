@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Booking Progress -->
        <div class="flex items-center justify-center mb-12">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-soft-gold text-white flex items-center justify-center font-medium text-sm shadow-sm">1</div>
                <div class="ml-3 text-sm font-medium text-soft-gold hidden sm:block">Layanan</div>
            </div>
            <div class="w-12 sm:w-24 h-px bg-soft-gold mx-2 sm:mx-4 opacity-50"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-soft-brown text-white flex items-center justify-center font-medium text-sm shadow-md ring-4 ring-cream">2</div>
                <div class="ml-3 text-sm font-medium text-soft-brown hidden sm:block">Profesional</div>
            </div>
            <div class="w-12 sm:w-24 h-px bg-cream mx-2 sm:mx-4"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-cream text-soft-beige flex items-center justify-center font-medium text-sm border border-soft-beige">3</div>
                <div class="ml-3 text-sm font-medium text-text-mid hidden sm:block">Waktu</div>
            </div>
        </div>

        <!-- Selected Service Summary -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-cream mb-12 flex flex-col sm:flex-row items-center gap-6">
            @if($layanan->gambar)
                <img src="{{ $layanan->gambar }}" alt="{{ $layanan->nama_layanan }}" class="w-24 h-24 object-cover rounded-xl">
            @else
                <div class="w-24 h-24 bg-cream rounded-xl flex items-center justify-center text-soft-beige">
                    <i class="ph-light ph-sparkle text-3xl"></i>
                </div>
            @endif
            <div class="flex-grow text-center sm:text-left">
                <span class="text-soft-gold text-xs font-semibold uppercase tracking-wider">{{ $layanan->kategori_label }}</span>
                <h2 class="text-2xl font-serif text-text-dark mt-1">{{ $layanan->nama_layanan }}</h2>
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4 mt-2 text-sm text-text-mid">
                    <span class="flex items-center gap-1"><i class="ph-fill ph-clock text-soft-brown"></i> {{ $layanan->durasi_formatted }}</span>
                    <span class="flex items-center gap-1"><i class="ph-fill ph-tag text-soft-brown"></i> {{ $layanan->harga_formatted }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('layanan') }}" class="text-sm font-medium text-soft-brown hover:text-text-dark underline decoration-soft-beige underline-offset-4">Ubah Layanan</a>
            </div>
        </div>

        <!-- Header -->
        <div class="text-center mb-10 fade-in-up">
            <h1 class="text-3xl font-serif text-text-dark mb-3">Pilih Spesialis Anda</h1>
            <p class="text-text-mid">Pilih profesional kecantikan yang akan menangani perawatan Anda.</p>
        </div>

        <!-- Professionals Grid -->
        @if($profesionals->isEmpty())
            <div class="text-center py-16 bg-cream rounded-3xl border border-soft-beige/50">
                <i class="ph-light ph-users-slash text-5xl text-soft-beige mb-4"></i>
                <h3 class="text-xl font-serif text-text-dark mb-2">Belum Ada Spesialis</h3>
                <p class="text-text-mid">Mohon maaf, belum ada profesional yang tersedia untuk kategori ini.</p>
                <a href="{{ route('layanan') }}" class="btn-outline inline-block mt-6 px-6 py-2 rounded-full text-sm">Kembali</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($profesionals as $prof)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-soft border border-cream transition-all duration-300 relative group flex flex-col h-full">
                        
                        <!-- Status Badge -->
                        @if(!$prof->isAvailable())
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-red-500/90 backdrop-blur text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1">
                                    <i class="ph-fill ph-prohibit"></i> {{ $prof->status_label }}
                                </span>
                            </div>
                        @endif

                        <!-- Photo Header -->
                        <div class="h-32 bg-nude-pink/20 relative">
                            <div class="absolute -bottom-12 left-1/2 -translate-x-1/2">
                                @if($prof->foto)
                                    <img src="{{ $prof->foto }}" alt="{{ $prof->nama }}" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-sm {{ !$prof->isAvailable() ? 'grayscale' : '' }}">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-cream border-4 border-white shadow-sm flex items-center justify-center text-soft-brown">
                                        <i class="ph-fill ph-user text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="pt-16 px-6 pb-6 text-center flex-grow flex flex-col">
                            <h3 class="font-serif text-xl font-semibold text-text-dark mb-1">{{ $prof->nama }}</h3>
                            <p class="text-soft-gold text-sm font-medium mb-3">{{ $prof->spesialisasi_label }}</p>
                            
                            <div class="flex items-center justify-center gap-4 mb-4 text-sm">
                                <div class="flex items-center gap-1 text-soft-brown">
                                    <i class="ph-fill ph-star text-soft-gold"></i> {{ number_format($prof->rating, 1) }}
                                </div>
                                <div class="w-1 h-1 rounded-full bg-soft-beige"></div>
                                <div class="flex items-center gap-1 text-text-mid">
                                    <i class="ph-fill ph-briefcase"></i> {{ $prof->pengalaman_tahun }} Thn
                                </div>
                            </div>
                            
                            @if($prof->bio)
                                <p class="text-sm text-text-mid mb-6 line-clamp-3 italic">"{{ $prof->bio }}"</p>
                            @endif
                            
                            <!-- Action -->
                            <div class="mt-auto pt-4 border-t border-cream">
                                @if($prof->isAvailable())
                                    <a href="{{ route('booking.reservasi', ['layanan' => $layanan->id, 'profesional' => $prof->id]) }}" 
                                       class="block w-full py-2.5 bg-soft-brown text-white text-sm font-medium rounded-xl hover:bg-text-dark transition-colors shadow-sm">
                                        Pilih Spesialis
                                    </a>
                                @else
                                    <button disabled class="w-full py-2.5 bg-gray-100 text-gray-400 text-sm font-medium rounded-xl cursor-not-allowed">
                                        Tidak Tersedia
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
