@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-warm-white flex pt-20">
    <!-- Left Side: Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-cream/30">
        <div class="w-full max-w-md fade-in-up">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-serif text-text-dark mb-2">Buat Akun</h1>
                <p class="text-text-mid">Bergabunglah dan nikmati kemudahan reservasi</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-text-dark mb-1.5">Nama Lengkap</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-user text-text-mid text-lg"></i>
                        </div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            class="block w-full pl-11 pr-4 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm @error('name') border-red-500 @enderror"
                            placeholder="Nama lengkap Anda">
                    </div>
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1"><i class="ph-fill ph-warning-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-text-dark mb-1.5">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-envelope-simple text-text-mid text-lg"></i>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            class="block w-full pl-11 pr-4 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com">
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1"><i class="ph-fill ph-warning-circle"></i> {{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-text-dark mb-1.5">Nomor Handphone</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-phone text-text-mid text-lg"></i>
                        </div>
                        <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" required
                            class="block w-full pl-11 pr-4 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm @error('no_hp') border-red-500 @enderror"
                            placeholder="08123456789">
                    </div>
                    @error('no_hp')
                        <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1"><i class="ph-fill ph-warning-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-text-dark mb-1.5">Kata Sandi</label>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-lock-key text-text-mid text-lg"></i>
                        </div>
                        <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="new-password"
                            class="block w-full pl-11 pr-12 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm @error('password') border-red-500 @enderror"
                            placeholder="Minimal 8 karakter">
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-text-mid hover:text-soft-brown focus:outline-none">
                            <i class="ph text-lg" :class="show ? 'ph-eye-slash' : 'ph-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1"><i class="ph-fill ph-warning-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password-confirm" class="block text-sm font-medium text-text-dark mb-1.5">Konfirmasi Kata Sandi</label>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-check-circle text-text-mid text-lg"></i>
                        </div>
                        <input id="password-confirm" :type="show ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password"
                            class="block w-full pl-11 pr-12 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm"
                            placeholder="Ulangi kata sandi">
                    </div>
                </div>

                <button type="submit" class="w-full flex justify-center py-3.5 px-4 mt-2 border border-transparent rounded-xl shadow-soft text-sm font-medium text-white bg-soft-brown hover:bg-text-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-soft-gold transition-all transform hover:-translate-y-0.5">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-text-mid">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-medium text-soft-brown hover:text-text-dark transition-colors">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Right Side: Image -->
    <div class="hidden lg:block lg:w-1/2 relative">
        <div class="absolute inset-0 bg-text-dark/20 z-10"></div>
        <img src="https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?w=1200&q=80" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 z-20 flex flex-col justify-end p-16">
            <h2 class="text-4xl font-serif text-white mb-4">Langkah Awal</h2>
            <p class="text-cream/90 text-lg max-w-md">Bergabunglah dan dapatkan akses eksklusif untuk mengatur janji temu perawatan impian Anda.</p>
        </div>
    </div>
</div>
@endsection
