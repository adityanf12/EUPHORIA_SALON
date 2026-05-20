@extends('layouts.admin')

@section('title', 'Data Pelanggan — AdminPanel')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-serif text-gray-900">Pelanggan</h1>
        <p class="text-sm text-gray-500 mt-1">Daftar semua pelanggan yang terdaftar di sistem.</p>
    </div>
    
    <form action="{{ route('admin.customers.index') }}" method="GET" class="relative">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, no hp..." 
            class="pl-10 pr-4 py-2 border-gray-200 rounded-xl focus:ring-soft-brown focus:border-soft-brown text-sm w-full md:w-64">
        <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
    </form>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-700 font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">Nama Pelanggan</th>
                    <th scope="col" class="px-6 py-4">Kontak</th>
                    <th scope="col" class="px-6 py-4">Tanggal Bergabung</th>
                    <th scope="col" class="px-6 py-4 text-center">Total Reservasi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($customers as $customer)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=D9B8A8&color=8B6B61" class="w-10 h-10 rounded-full object-cover">
                                <div class="font-medium text-gray-900">{{ $customer->name }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-gray-900">{{ $customer->email }}</div>
                            <div class="text-xs text-gray-500">{{ $customer->no_hp ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-soft-beige/30 text-soft-brown font-semibold text-sm">
                                {{ $customer->reservasi_count }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">Belum ada data pelanggan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($customers->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $customers->links() }}
        </div>
    @endif
</div>
@endsection
