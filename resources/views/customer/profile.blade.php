@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 text-center fade-in-up">
            <h1 class="text-3xl font-serif text-text-dark mb-2">Profil Saya</h1>
            <p class="text-text-mid">Kelola informasi akun pribadi Anda.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-soft border border-cream overflow-hidden">
            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row gap-12">
                    
                    <!-- Avatar Section -->
                    <div class="md:w-1/3 flex flex-col items-center text-center">
                        <div class="relative mb-6">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=D9B8A8&color=8B6B61&size=200" 
                                 class="w-40 h-40 rounded-full object-cover border-4 border-cream shadow-sm">
                            <div class="absolute bottom-2 right-2 w-10 h-10 bg-soft-brown rounded-full border-4 border-white flex items-center justify-center text-white shadow-sm cursor-pointer hover:bg-text-dark transition-colors">
                                <i class="ph-bold ph-camera"></i>
                            </div>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-text-dark">{{ $user->name }}</h3>
                        <p class="text-sm text-text-mid mt-1">{{ $user->email }}</p>
                        <span class="mt-4 px-4 py-1 bg-cream text-soft-brown text-xs font-semibold rounded-full uppercase tracking-widest">
                            Customer
                        </span>
                    </div>

                    <!-- Form Section -->
                    <div class="md:w-2/3">
                        <form method="POST" action="{{ route('customer.profile.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1.5">Nama Lengkap</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ph ph-user text-text-mid text-lg"></i>
                                    </div>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                        class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors">
                                </div>
                                @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1.5">Alamat Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ph ph-envelope-simple text-text-mid text-lg"></i>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                        class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors">
                                </div>
                                @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1.5">Nomor Handphone</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ph ph-phone text-text-mid text-lg"></i>
                                    </div>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                        class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors"
                                        placeholder="Kosong">
                                </div>
                                @error('no_hp') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="pt-4 flex justify-end">
                                <button type="submit" class="btn-primary px-8 py-3 rounded-xl font-medium shadow-soft">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
