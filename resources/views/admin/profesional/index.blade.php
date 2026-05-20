@extends('layouts.admin')

@section('title', 'Data Profesional — AdminPanel')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">Kelola Profesional</h1>
        <p class="text-sm text-gray-500 mt-1">Daftar stylist, jadwal cuti, dan ketersediaan.</p>
    </div>
    
    <a href="{{ route('admin.profesional.create') }}" class="inline-flex items-center gap-2 bg-soft-brown text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-text-dark transition-colors shadow-sm">
        <i class="ph-bold ph-plus"></i> Tambah Profesional
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700 font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">Profil</th>
                    <th scope="col" class="px-6 py-4">Spesialisasi</th>
                    <th scope="col" class="px-6 py-4">Rating & Exp</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($profesional as $p)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($p->foto)
                                    <img src="{{ $p->foto }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                        <i class="ph-fill ph-user"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $p->nama }}</div>
                                    <div class="text-xs text-soft-brown">{{ $p->tarif_formatted }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600 uppercase tracking-wider">
                                {{ $p->spesialisasi_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1 text-soft-gold text-xs mb-1">
                                <i class="ph-fill ph-star"></i> <span class="font-medium text-gray-700">{{ number_format($p->rating, 1) }}</span>
                            </div>
                            <div class="text-xs text-gray-500">{{ $p->pengalaman_tahun }} Tahun</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($p->status == 'available')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Tersedia</span>
                            @elseif($p->status == 'on_leave')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Cuti</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Tdk Tersedia</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.profesional.edit', $p->id) }}" class="p-1.5 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="ph-bold ph-pencil-simple text-lg"></i>
                                </a>
                                <form action="{{ route('admin.profesional.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus profesional ini?')">
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
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada data profesional.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
