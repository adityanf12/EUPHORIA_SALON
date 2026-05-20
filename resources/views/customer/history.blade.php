@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 fade-in-up">
            <div>
                <h1 class="text-3xl font-serif text-text-dark mb-2">Riwayat Reservasi</h1>
                <p class="text-text-mid">Daftar jadwal perawatan Anda di Euphoria.</p>
            </div>
            
            <!-- Filters -->
            <div class="mt-6 md:mt-0">
                <form action="{{ route('customer.history') }}" method="GET" class="flex items-center gap-3">
                    <select name="status" class="bg-white border border-soft-beige text-text-dark text-sm rounded-full focus:ring-soft-gold focus:border-soft-gold block p-2.5 shadow-sm" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Selesai</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Batal</option>
                    </select>
                </form>
            </div>
        </div>

        @if($reservasi->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl border border-cream shadow-sm">
                <i class="ph-light ph-calendar-blank text-6xl text-soft-beige mb-4"></i>
                <h3 class="text-xl font-serif text-text-dark mb-2">Belum Ada Reservasi</h3>
                <p class="text-text-mid mb-6">Anda belum pernah melakukan reservasi perawatan.</p>
                <a href="{{ route('layanan') }}" class="btn-primary px-8 py-3 rounded-full text-sm font-medium shadow-soft">
                    Buat Janji Temu Sekarang
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($reservasi as $res)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-soft transition-shadow border border-cream overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            
                            <!-- Status & Date (Left/Top) -->
                            <div class="md:w-1/4 bg-cream/50 p-6 flex flex-col justify-center border-b md:border-b-0 md:border-r border-cream">
                                <div class="mb-4">
                                    @if($res->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                            <i class="ph-fill ph-clock"></i> Pending
                                        </span>
                                    @elseif($res->status == 'confirmed')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                                            <i class="ph-fill ph-calendar-check"></i> Confirmed
                                        </span>
                                    @elseif($res->status == 'done')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">
                                            <i class="ph-fill ph-check-circle"></i> Selesai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                                            <i class="ph-fill ph-x-circle"></i> Batal
                                        </span>
                                    @endif
                                </div>
                                <div class="text-sm text-text-mid mb-1">Tanggal & Waktu</div>
                                <div class="font-semibold text-text-dark">{{ $res->tanggal->translatedFormat('d M Y') }}</div>
                                <div class="text-soft-brown font-medium mt-1"><i class="ph-bold ph-clock"></i> {{ $res->jam }}</div>
                            </div>
                            
                            <!-- Details (Middle) -->
                            <div class="md:w-1/2 p-6 flex flex-col justify-center">
                                <span class="text-[10px] uppercase tracking-wider text-soft-gold font-bold mb-1">{{ $res->layanan->kategori_label }}</span>
                                <h3 class="text-xl font-serif text-text-dark mb-4">{{ $res->layanan->nama_layanan }}</h3>
                                
                                <div class="flex items-center gap-3">
                                    @if($res->profesional->foto)
                                        <img src="{{ $res->profesional->foto }}" class="w-10 h-10 rounded-full object-cover border border-cream">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-soft-beige flex items-center justify-center text-soft-brown">
                                            <i class="ph-fill ph-user text-lg"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-xs text-text-mid">Ditangani oleh</div>
                                        <div class="text-sm font-medium text-text-dark">{{ $res->profesional->nama }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Price & Actions (Right) -->
                            <div class="md:w-1/4 p-6 bg-gray-50 flex flex-col justify-center items-start md:items-end border-t md:border-t-0 md:border-l border-cream">
                                <div class="text-xs text-text-mid mb-1 md:text-right">Total Biaya</div>
                                <div class="text-lg font-bold text-soft-brown mb-4 md:text-right">{{ $res->layanan->harga_formatted }}</div>
                                
                                <button onclick="alert('Fitur rincian dalam pengembangan')" class="w-full md:w-auto text-center px-4 py-2 bg-white border border-soft-beige text-text-dark text-sm font-medium rounded-xl hover:bg-cream transition-colors shadow-sm">
                                    Lihat Rincian
                                </button>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $reservasi->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Customize Pagination UI -->
<style>
    .pagination { display: flex; justify-content: center; gap: 0.25rem; }
    .page-item .page-link { 
        padding: 0.5rem 1rem; 
        border-radius: 0.5rem; 
        color: theme('colors.soft-brown'); 
        background: white; 
        border: 1px solid theme('colors.cream'); 
    }
    .page-item.active .page-link { 
        background: theme('colors.soft-brown'); 
        color: white; 
        border-color: theme('colors.soft-brown'); 
    }
</style>
@endsection
