@extends('layouts.admin')

@section('title', 'Data Reservasi — AdminPanel')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">Kelola Reservasi</h1>
        <p class="text-sm text-gray-500 mt-1">Daftar semua reservasi pelanggan dan ubah status.</p>
    </div>
    
    <!-- Filter -->
    <div class="bg-white p-2 rounded-xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.reservasi.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="text-sm border-gray-200 rounded-lg focus:ring-soft-gold focus:border-soft-gold px-3 py-2">
            
            <select name="status" class="text-sm border-gray-200 rounded-lg focus:ring-soft-gold focus:border-soft-gold px-3 py-2">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Selesai</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Batal</option>
            </select>
            
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/layanan..." class="text-sm border-gray-200 rounded-lg focus:ring-soft-gold focus:border-soft-gold pl-3 pr-8 py-2 w-full sm:w-48">
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-soft-brown">
                    <i class="ph-bold ph-magnifying-glass"></i>
                </button>
            </div>
            
            @if(request()->anyFilled(['tanggal', 'status', 'search']))
                <a href="{{ route('admin.reservasi.index') }}" class="px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-lg flex items-center justify-center" title="Reset Filter">
                    <i class="ph-bold ph-x"></i>
                </a>
            @endif
        </form>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700 font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">ID/Tanggal</th>
                    <th scope="col" class="px-6 py-4">Pelanggan</th>
                    <th scope="col" class="px-6 py-4">Layanan & Stylist</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($reservasi as $res)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900 mb-1">#{{ str_pad($res->id, 5, '0', STR_PAD_LEFT) }}</div>
                            <div class="text-xs whitespace-nowrap">
                                {{ $res->tanggal->format('d M Y') }}<br>
                                <span class="font-medium text-soft-brown">{{ $res->jam }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $res->nama_pemesan }}</div>
                            <div class="text-xs text-gray-500">{{ $res->no_hp }}</div>
                            @if($res->catatan)
                                <div class="mt-1 text-[11px] text-gray-400 italic max-w-[150px] truncate" title="{{ $res->catatan }}">"{{ $res->catatan }}"</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $res->layanan->nama_layanan }}</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                <i class="ph-fill ph-user text-gray-400"></i> {{ $res->profesional->nama }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($res->status == 'pending')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            @elseif($res->status == 'confirmed')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Confirmed</span>
                            @elseif($res->status == 'done')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Batal</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            
                            <!-- Status Dropdown Form -->
                            <form action="{{ route('admin.reservasi.updateStatus', $res->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-xs rounded-md border-gray-300 focus:ring-soft-brown focus:border-soft-brown py-1.5 pl-2 pr-6 bg-white cursor-pointer shadow-sm">
                                    <option value="pending" {{ $res->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="done" {{ $res->status == 'done' ? 'selected' : '' }}>Selesai</option>
                                    <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Batal</option>
                                </select>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            Belum ada data reservasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($reservasi->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $reservasi->links() }}
        </div>
    @endif
</div>
@endsection
