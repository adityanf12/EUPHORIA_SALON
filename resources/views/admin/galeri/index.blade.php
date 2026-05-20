@extends('layouts.admin')

@section('title', 'Data Galeri — AdminPanel')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">Kelola Galeri</h1>
        <p class="text-sm text-gray-500 mt-1">Atur foto-foto inspirasi dan hasil karya salon.</p>
    </div>
    
    <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center gap-2 bg-soft-brown text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-text-dark transition-colors shadow-sm">
        <i class="ph-bold ph-plus"></i> Tambah Galeri
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galeri as $item)
            <div class="group relative rounded-xl overflow-hidden bg-gray-100 aspect-square shadow-sm">
                <img src="{{ $item->gambar }}" class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="w-8 h-8 rounded bg-white/20 hover:bg-white/40 flex items-center justify-center text-white backdrop-blur transition-colors">
                            <i class="ph-bold ph-pencil-simple"></i>
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-8 h-8 rounded bg-red-500/80 hover:bg-red-500 flex items-center justify-center text-white backdrop-blur transition-colors">
                                <i class="ph-bold ph-trash"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div>
                        <h4 class="text-white font-medium text-sm truncate">{{ $item->judul }}</h4>
                        <p class="text-gray-300 text-xs mt-1 truncate">{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    </div>
                </div>
                
                @if(!$item->is_active)
                    <div class="absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-sm uppercase">Draft</div>
                @endif
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-gray-500">
                <i class="ph-light ph-image text-5xl mb-3 text-gray-300"></i>
                <p>Belum ada gambar di galeri.</p>
            </div>
        @endforelse
    </div>
    
    @if($galeri->hasPages())
        <div class="mt-6">
            {{ $galeri->links() }}
        </div>
    @endif
</div>
@endsection
