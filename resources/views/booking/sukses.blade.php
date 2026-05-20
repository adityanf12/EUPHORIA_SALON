@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-20 flex items-center justify-center">
    <div class="max-w-2xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl shadow-soft border border-cream overflow-hidden fade-in-up">
            
            <!-- Success Header -->
            <div class="bg-soft-brown px-8 py-10 text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1560066984-138dadb4c035?w=800&q=80')] bg-cover bg-center"></div>
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner border border-white/30">
                        <i class="ph-bold ph-check text-4xl text-white"></i>
                    </div>
                    <h1 class="text-3xl font-serif text-white mb-2">Reservasi Berhasil!</h1>
                    <p class="text-cream/90 text-sm max-w-sm mx-auto">Terima kasih telah memilih Euphoria. Jadwal perawatan Anda telah kami konfirmasi.</p>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="p-8">
                <div class="bg-cream/50 rounded-2xl p-6 border border-soft-beige/30 mb-8 relative">
                    <div class="absolute top-0 right-6 -translate-y-1/2 bg-white px-4 py-1 rounded-full text-xs font-bold text-soft-gold shadow-sm border border-soft-beige uppercase tracking-wide">
                        ID: #{{ str_pad($reservasi->id, 5, '0', STR_PAD_LEFT) }}
                    </div>
                    
                    <h3 class="text-xs uppercase tracking-widest text-soft-brown font-bold mb-4">Detail Perawatan</h3>
                    
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown shadow-sm shrink-0">
                                <i class="ph-fill ph-sparkle text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-text-mid mb-0.5">Layanan</p>
                                <p class="font-medium text-text-dark">{{ $reservasi->layanan->nama_layanan }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown shadow-sm shrink-0">
                                <i class="ph-fill ph-user text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-text-mid mb-0.5">Profesional</p>
                                <p class="font-medium text-text-dark">{{ $reservasi->profesional->nama }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown shadow-sm shrink-0">
                                <i class="ph-fill ph-calendar-blank text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-text-mid mb-0.5">Jadwal</p>
                                <p class="font-medium text-text-dark">{{ $reservasi->tanggal->translatedFormat('l, d F Y') }} <span class="mx-2 text-soft-beige">|</span> Pukul {{ $reservasi->jam }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-soft-brown shadow-sm shrink-0">
                                <i class="ph-fill ph-user-circle text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-text-mid mb-0.5">Atas Nama</p>
                                <p class="font-medium text-text-dark">{{ $reservasi->nama_pemesan }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center space-y-4">
                    <p class="text-sm text-text-mid">Silakan datang 10 menit sebelum waktu reservasi.</p>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4 border-t border-cream">
                        <a href="{{ route('customer.history') }}" class="btn-primary w-full sm:w-auto px-8 py-3 rounded-xl text-sm font-medium shadow-sm">
                            Lihat Riwayat Reservasi
                        </a>
                        <a href="{{ route('home') }}" class="btn-outline w-full sm:w-auto px-8 py-3 rounded-xl text-sm font-medium bg-white">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection
