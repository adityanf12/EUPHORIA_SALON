@extends('layouts.admin')

@section('title', 'Data Layanan — AdminPanel')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">Kelola Layanan</h1>
        <p class="text-sm text-gray-500 mt-1">Atur daftar perawatan, harga, dan ketersediaan kuota.</p>
    </div>
    
    <a href="{{ route('admin.layanan.create') }}" class="inline-flex items-center gap-2 bg-soft-brown text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-text-dark transition-colors shadow-sm">
        <i class="ph-bold ph-plus"></i> Tambah Layanan
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700 font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">Layanan</th>
                    <th scope="col" class="px-6 py-4">Kategori</th>
                    <th scope="col" class="px-6 py-4">Harga & Durasi</th>
                    <th scope="col" class="px-6 py-4">Kuota/Hari</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($layanan as $l)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($l->gambar)
                                    <img src="{{ $l->gambar }}" class="w-10 h-10 rounded-lg object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                        <i class="ph-fill ph-image"></i>
                                    </div>
                                @endif
                                <div class="font-medium text-gray-900">{{ $l->nama_layanan }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600 uppercase tracking-wider">
                                {{ $l->kategori_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $l->harga_formatted }}</div>
                            <div class="text-xs text-gray-500 flex items-center gap-1 mt-0.5"><i class="ph-fill ph-clock"></i> {{ $l->durasi_formatted }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="font-medium text-gray-900">{{ $l->kuota_harian }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($l->status == 'available')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Tersedia</span>
                            @elseif($l->status == 'unavailable')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Tdk Tersedia</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Tutup</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <form action="{{ route('admin.layanan.toggleStatus', $l->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="p-1.5 text-gray-400 hover:text-soft-brown transition-colors" title="Toggle Status">
                                        <i class="ph-bold {{ $l->status == 'available' ? 'ph-toggle-right text-green-500' : 'ph-toggle-left' }} text-xl"></i>
                                    </button>
                                </form>
                                
                                <a href="{{ route('admin.layanan.edit', $l->id) }}" class="p-1.5 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="ph-bold ph-pencil-simple text-lg"></i>
                                </a>
                                
                                <form action="{{ route('admin.layanan.destroy', $l->id) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">Belum ada data layanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($layanan->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $layanan->links() }}
        </div>
    @endif
</div>
@endsection
