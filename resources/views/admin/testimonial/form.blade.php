@extends('layouts.admin')

@section('title', 'Form Testimonial — AdminPanel')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">{{ isset($testimonial) ? 'Edit Testimonial' : 'Tambah Testimonial' }}</h1>
        <p class="text-sm text-gray-500 mt-1">Isi formulir untuk ulasan pelanggan.</p>
    </div>
    <a href="{{ route('admin.testimonial.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 border border-gray-300 px-4 py-2 rounded-xl">Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <form action="{{ isset($testimonial) ? route('admin.testimonial.update', $testimonial->id) : route('admin.testimonial.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
        @csrf
        @if(isset($testimonial)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label>
                <input type="text" name="nama" value="{{ old('nama', $testimonial->nama ?? '') }}" required
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rating (1-5)</label>
                <input type="number" name="rating" value="{{ old('rating', $testimonial->rating ?? '5') }}" required min="1" max="5"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Tampil</label>
                <select name="is_active" class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                    <option value="1" {{ old('is_active', $testimonial->is_active ?? '1') == '1' ? 'selected' : '' }}>Aktif (Tampil)</option>
                    <option value="0" {{ old('is_active', $testimonial->is_active ?? '1') == '0' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                </select>
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Layanan yang Diulas (Opsional)</label>
                <input type="text" name="layanan_label" value="{{ old('layanan_label', $testimonial->layanan_label ?? '') }}" placeholder="Misal: Hair Spa Premium"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Avatar (Opsional)</label>
                <input type="url" name="avatar" value="{{ old('avatar', $testimonial->avatar ?? '') }}" placeholder="https://..."
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                <p class="text-[11px] text-gray-400 mt-1">Kosongkan jika ingin digenerate secara otomatis.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Komentar / Ulasan</label>
                <textarea name="komentar" rows="4" required
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">{{ old('komentar', $testimonial->komentar ?? '') }}</textarea>
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
