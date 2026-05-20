@extends('layouts.admin')

@section('title', 'Form Profesional — AdminPanel')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">{{ isset($profesional) ? 'Edit Profesional' : 'Tambah Profesional' }}</h1>
        <p class="text-sm text-gray-500 mt-1">Isi formulir untuk menyimpan data profesional.</p>
    </div>
    <a href="{{ route('admin.profesional.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 border border-gray-300 px-4 py-2 rounded-xl">Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <form action="{{ isset($profesional) ? route('admin.profesional.update', $profesional->id) : route('admin.profesional.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
        @csrf
        @if(isset($profesional)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $profesional->nama ?? '') }}" required
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Spesialisasi</label>
                <select name="spesialisasi" required class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                    <option value="hair" {{ old('spesialisasi', $profesional->spesialisasi ?? '') == 'hair' ? 'selected' : '' }}>Hair Stylist</option>
                    <option value="nail" {{ old('spesialisasi', $profesional->spesialisasi ?? '') == 'nail' ? 'selected' : '' }}>Nail Artist</option>
                    <option value="face" {{ old('spesialisasi', $profesional->spesialisasi ?? '') == 'face' ? 'selected' : '' }}>Face Expert</option>
                    <option value="relaxation" {{ old('spesialisasi', $profesional->spesialisasi ?? '') == 'relaxation' ? 'selected' : '' }}>Therapist</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pengalaman (Tahun)</label>
                <input type="number" name="pengalaman_tahun" value="{{ old('pengalaman_tahun', $profesional->pengalaman_tahun ?? '') }}" required min="0"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tarif Konsultasi/Layanan Tambahan (Rp)</label>
                <input type="number" name="tarif" value="{{ old('tarif', isset($profesional) ? (int)$profesional->tarif : '') }}" required min="0"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rating Bintang (1-5)</label>
                <input type="number" step="0.1" name="rating" value="{{ old('rating', $profesional->rating ?? '5.0') }}" required min="1" max="5"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Foto (Opsional)</label>
                <input type="url" name="foto" value="{{ old('foto', $profesional->foto ?? '') }}" placeholder="https://..."
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">
                    <option value="available" {{ old('status', $profesional->status ?? '') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="on_leave" {{ old('status', $profesional->status ?? '') == 'on_leave' ? 'selected' : '' }}>Sedang Cuti</option>
                    <option value="unavailable" {{ old('status', $profesional->status ?? '') == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Biografi/Bio Singkat</label>
                <textarea name="bio" rows="3"
                    class="w-full rounded-xl border-gray-300 focus:border-soft-brown focus:ring focus:ring-soft-brown focus:ring-opacity-50">{{ old('bio', $profesional->bio ?? '') }}</textarea>
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
