@extends('layouts.admin')

@section('title', 'Dashboard — AdminPanel')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-serif text-gray-900">Dashboard</h1>
    <p class="text-sm text-gray-500 mt-1">Ringkasan aktivitas dan performa salon hari ini.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
    <!-- Stat 1 -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Reservasi Hari Ini</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $reservasiHariIni }}</h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center">
            <i class="ph-fill ph-calendar-check text-2xl"></i>
        </div>
    </div>
    
    <!-- Stat 2 -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Pelanggan</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $totalCustomer }}</h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-green-50 text-green-500 flex items-center justify-center">
            <i class="ph-fill ph-users text-2xl"></i>
        </div>
    </div>

    <!-- Stat 3 -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Pending Konfirmasi</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $reservasiPending }}</h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center">
            <i class="ph-fill ph-clock text-2xl"></i>
        </div>
    </div>

    <!-- Stat 4 -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Layanan</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $totalLayanan }}</h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center">
            <i class="ph-fill ph-sparkle text-2xl"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Schedule Today -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-serif text-gray-900">Jadwal Hari Ini</h2>
                <span class="text-sm text-gray-500">{{ date('d M Y') }}</span>
            </div>
            
            <div class="p-6">
                @if($jadwalHariIni->isEmpty())
                    <div class="text-center py-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 text-gray-400 mb-3">
                            <i class="ph-light ph-calendar-blank text-3xl"></i>
                        </div>
                        <p class="text-gray-500">Tidak ada jadwal reservasi hari ini.</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($jadwalHariIni as $jadwal)
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ $jadwal->status == 'pending' ? 'border-yellow-200 bg-yellow-50/30' : 'border-gray-100 bg-gray-50' }}">
                                <div class="w-16 text-center shrink-0">
                                    <div class="text-lg font-bold text-gray-900">{{ $jadwal->jam }}</div>
                                </div>
                                <div class="w-px h-12 bg-gray-200 shrink-0"></div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-medium text-gray-900">{{ $jadwal->nama_pemesan }}</h4>
                                            <p class="text-sm text-soft-brown font-medium mt-0.5">{{ $jadwal->layanan->nama_layanan }}</p>
                                            <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                                <i class="ph-fill ph-user"></i> Stylist: {{ $jadwal->profesional->nama }}
                                            </p>
                                        </div>
                                        <div>
                                            @if($jadwal->status == 'pending')
                                                <span class="px-2.5 py-1 rounded-md text-[10px] font-semibold bg-yellow-100 text-yellow-800 uppercase tracking-wider">Pending</span>
                                            @else
                                                <span class="px-2.5 py-1 rounded-md text-[10px] font-semibold bg-blue-100 text-blue-800 uppercase tracking-wider">Confirmed</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Reservations Widget -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-serif text-gray-900">Reservasi Terbaru</h2>
                <a href="{{ route('admin.reservasi.index') }}" class="text-sm text-soft-brown hover:text-text-dark font-medium">Lihat Semua</a>
            </div>
            
            <div class="p-0">
                <ul class="divide-y divide-gray-100">
                    @forelse($recentReservasi as $res)
                        <li class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <div class="font-medium text-sm text-gray-900">{{ $res->nama_pemesan }}</div>
                                <div class="text-xs text-gray-500">{{ $res->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="text-sm text-gray-600 mb-2 truncate">{{ $res->layanan->nama_layanan }}</div>
                            <div class="flex items-center justify-between">
                                <div class="text-xs font-medium text-gray-500 flex items-center gap-1">
                                    <i class="ph-fill ph-calendar-blank"></i> {{ $res->tanggal->format('d/m') }} - {{ $res->jam }}
                                </div>
                                
                                @if($res->status == 'pending')
                                    <span class="w-2 h-2 rounded-full bg-yellow-400" title="Pending"></span>
                                @elseif($res->status == 'confirmed')
                                    <span class="w-2 h-2 rounded-full bg-blue-400" title="Confirmed"></span>
                                @elseif($res->status == 'done')
                                    <span class="w-2 h-2 rounded-full bg-green-400" title="Selesai"></span>
                                @else
                                    <span class="w-2 h-2 rounded-full bg-red-400" title="Batal"></span>
                                @endif
                            </div>
                        </li>
                    @empty
                        <li class="p-6 text-center text-gray-500 text-sm">Belum ada data.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
