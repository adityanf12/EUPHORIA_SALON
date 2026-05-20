@extends('layouts.admin')

@section('title', 'Data Testimonial — AdminPanel')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">Kelola Testimonial</h1>
        <p class="text-sm text-gray-500 mt-1">Ulasan dan rating dari pelanggan untuk ditampilkan di halaman depan.</p>
    </div>
    
    <a href="{{ route('admin.testimonial.create') }}" class="inline-flex items-center gap-2 bg-soft-brown text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-text-dark transition-colors shadow-sm">
        <i class="ph-bold ph-plus"></i> Tambah Testimonial
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700 font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">Pelanggan</th>
                    <th scope="col" class="px-6 py-4">Rating</th>
                    <th scope="col" class="px-6 py-4 w-1/3">Komentar</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($testimonials as $testi)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($testi->avatar)
                                    <img src="{{ $testi->avatar }}" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                        <i class="ph-fill ph-user"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $testi->nama }}</div>
                                    <div class="text-[10px] text-gray-400 uppercase tracking-wider">{{ $testi->layanan_label ?? 'Layanan Umum' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex text-yellow-400 text-sm">
                                {!! $testi->stars !!}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-600 line-clamp-2 italic">"{{ $testi->komentar }}"</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($testi->is_active)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-semibold bg-green-100 text-green-800 uppercase tracking-wider">Aktif</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600 uppercase tracking-wider">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.testimonial.edit', $testi->id) }}" class="p-1.5 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="ph-bold ph-pencil-simple text-lg"></i>
                                </a>
                                <form action="{{ route('admin.testimonial.destroy', $testi->id) }}" method="POST" onsubmit="return confirm('Hapus testimonial ini?')">
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
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada data testimonial.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($testimonials->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
