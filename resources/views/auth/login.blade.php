@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-warm-white flex pt-20">
    <!-- Left Side: Image -->
    <div class="hidden lg:block lg:w-1/2 relative">
        <div class="absolute inset-0 bg-text-dark/20 z-10"></div>
        <img src="https://images.unsplash.com/photo-1522337660859-02fbefca4702?w=1200&q=80" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 z-20 flex flex-col justify-end p-16">
            <h2 class="text-4xl font-serif text-white mb-4">Kembali Bersinar</h2>
            <p class="text-cream/90 text-lg max-w-md">Masuk ke akun Anda dan mulai rencanakan sesi perawatan premium berikutnya bersama kami.</p>
        </div>
    </div>

    <!-- Right Side: Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-cream/30">
        <div class="w-full max-w-md fade-in-up">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-serif text-text-dark mb-2">Selamat Datang</h1>
                <p class="text-text-mid">Silakan masuk ke akun Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-text-dark mb-2">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-envelope-simple text-text-mid text-lg"></i>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            class="block w-full pl-11 pr-4 py-3 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="ph-fill ph-warning-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-text-dark">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-soft-brown hover:text-text-dark transition-colors">Lupa sandi?</a>
                        @endif
                    </div>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-lock-key text-text-mid text-lg"></i>
                        </div>
                        <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                            class="block w-full pl-11 pr-12 py-3 bg-white border border-soft-beige rounded-xl text-text-dark placeholder-gray-400 focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm @error('password') border-red-500 @enderror"
                            placeholder="••••••••">
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-text-mid hover:text-soft-brown focus:outline-none">
                            <i class="ph text-lg" :class="show ? 'ph-eye-slash' : 'ph-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="ph-fill ph-warning-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 text-soft-brown focus:ring-soft-gold border-gray-300 rounded cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-text-mid cursor-pointer">
                        Ingat Saya
                    </label>
                </div>

                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-soft text-sm font-medium text-white bg-soft-brown hover:bg-text-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-soft-gold transition-all transform hover:-translate-y-0.5">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-text-mid">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-medium text-soft-brown hover:text-text-dark transition-colors">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
