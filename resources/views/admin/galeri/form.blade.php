@extends('layouts.admin')

@section('title', 'Form Galeri — AdminPanel')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">{{ isset($galeri) ? 'Edit Gambar' : 'Tambah Gambar Galeri' }}</h1>
        <p class="text-sm text-gray-500 mt-1">Isi formulir untuk menyimpan gambar ke galeri.</p>
    </div>
    <a href="{{ route('admin.galeri.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 border border-gray-300 px-4 py-2 rounded-xl">Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <form action="{{ isset($galeri) ? route('admin.galeri.update', $galeri->id) : route('admin.galeri.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
        @csrf
        @if(isset($galeri)) @method('PUT') @endif

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Gambar</label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}" required
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Gambar</label>
                <input type="url" name="gambar" value="{{ old('gambar', $galeri->gambar ?? '') }}" required placeholder="https://..."
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>
            
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $galeri->urutan ?? '0') }}" required min="0"
                        class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Tampil</label>
                    <select name="is_active" class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                        <option value="1" {{ old('is_active', $galeri->is_active ?? '1') == '1' ? 'selected' : '' }}>Aktif (Tampil)</option>
                        <option value="0" {{ old('is_active', $galeri->is_active ?? '1') == '0' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-100">
            <button type="submit" class="bg-soft-brown text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-text-dark transition-colors shadow-sm">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection
