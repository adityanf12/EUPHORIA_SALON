@extends('layouts.admin')

@section('title', 'Form Layanan — AdminPanel')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">{{ isset($layanan) ? 'Edit Layanan' : 'Tambah Layanan' }}</h1>
        <p class="text-sm text-gray-500 mt-1">Isi formulir untuk menyimpan data layanan.</p>
    </div>
    <a href="{{ route('admin.layanan.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 border border-gray-300 px-4 py-2 rounded-xl">Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <form action="{{ isset($layanan) ? route('admin.layanan.update', $layanan->id) : route('admin.layanan.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
        @csrf
        @if(isset($layanan)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
                <input type="text" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan ?? '') }}" required
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori" required class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                    <option value="hair" {{ old('kategori', $layanan->kategori ?? '') == 'hair' ? 'selected' : '' }}>Hair</option>
                    <option value="nail" {{ old('kategori', $layanan->kategori ?? '') == 'nail' ? 'selected' : '' }}>Nail</option>
                    <option value="face" {{ old('kategori', $layanan->kategori ?? '') == 'face' ? 'selected' : '' }}>Face & Beauty</option>
                    <option value="relaxation" {{ old('kategori', $layanan->kategori ?? '') == 'relaxation' ? 'selected' : '' }}>Relaxation</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" value="{{ old('harga', isset($layanan) ? (int)$layanan->harga : '') }}" required min="0"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Durasi (Menit)</label>
                <input type="number" name="durasi_menit" value="{{ old('durasi_menit', $layanan->durasi_menit ?? '') }}" required min="15"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kuota Harian</label>
                <input type="number" name="kuota_harian" value="{{ old('kuota_harian', $layanan->kuota_harian ?? '10') }}" required min="0"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Gambar (Opsional)</label>
                <input type="url" name="gambar" value="{{ old('gambar', $layanan->gambar ?? '') }}" placeholder="https://..."
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                    <option value="available" {{ old('status', $layanan->status ?? '') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="unavailable" {{ old('status', $layanan->status ?? '') == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia Sementara</option>
                    <option value="closed" {{ old('status', $layanan->status ?? '') == 'closed' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">{{ old('deskripsi', $layanan->deskripsi ?? '') }}</textarea>
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
