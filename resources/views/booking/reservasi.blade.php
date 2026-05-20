@extends('layouts.app')

@section('content')
<div class="bg-warm-white min-h-screen pt-28 pb-20" x-data="bookingForm()">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Booking Progress -->
        <div class="flex items-center justify-center mb-12">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-soft-gold text-white flex items-center justify-center font-medium text-sm shadow-sm">1</div>
                <div class="ml-3 text-sm font-medium text-soft-gold hidden sm:block">Layanan</div>
            </div>
            <div class="w-12 sm:w-24 h-px bg-soft-gold mx-2 sm:mx-4 opacity-50"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-soft-gold text-white flex items-center justify-center font-medium text-sm shadow-sm">2</div>
                <div class="ml-3 text-sm font-medium text-soft-gold hidden sm:block">Profesional</div>
            </div>
            <div class="w-12 sm:w-24 h-px bg-soft-gold mx-2 sm:mx-4 opacity-50"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-soft-brown text-white flex items-center justify-center font-medium text-sm shadow-md ring-4 ring-cream">3</div>
                <div class="ml-3 text-sm font-medium text-soft-brown hidden sm:block">Waktu</div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-soft border border-cream overflow-hidden">
            <div class="flex flex-col md:flex-row">
                
                <!-- Left Summary Sidebar -->
                <div class="md:w-1/3 bg-cream p-8 md:border-r border-soft-beige/50">
                    <h3 class="font-serif text-xl text-text-dark mb-6">Ringkasan</h3>
                    
                    <!-- Service Summary -->
                    <div class="mb-6 bg-white p-4 rounded-xl shadow-sm">
                        <span class="text-[10px] uppercase tracking-wider text-soft-brown font-semibold mb-1 block">Layanan</span>
                        <div class="flex items-start gap-3">
                            @if($layanan->gambar)
                                <img src="{{ $layanan->gambar }}" class="w-12 h-12 rounded object-cover">
                            @else
                                <div class="w-12 h-12 rounded bg-soft-beige flex items-center justify-center text-soft-brown">
                                    <i class="ph-light ph-sparkle text-xl"></i>
                                </div>
                            @endif
                            <div>
                                <h4 class="font-medium text-text-dark text-sm">{{ $layanan->nama_layanan }}</h4>
                                <div class="text-xs text-text-mid mt-1">{{ $layanan->durasi_formatted }}</div>
                                <div class="text-sm font-semibold text-soft-brown mt-1">{{ $layanan->harga_formatted }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stylist Summary -->
                    <div class="mb-6 bg-white p-4 rounded-xl shadow-sm">
                        <span class="text-[10px] uppercase tracking-wider text-soft-brown font-semibold mb-1 block">Ditangani Oleh</span>
                        <div class="flex items-center gap-3">
                            @if($profesional->foto)
                                <img src="{{ $profesional->foto }}" class="w-12 h-12 rounded-full object-cover">
                            @else
                                <div class="w-12 h-12 rounded-full bg-soft-beige flex items-center justify-center text-soft-brown">
                                    <i class="ph-fill ph-user text-xl"></i>
                                </div>
                            @endif
                            <div>
                                <h4 class="font-medium text-text-dark text-sm">{{ $profesional->nama }}</h4>
                                <div class="text-xs text-soft-gold flex items-center gap-1 mt-0.5">
                                    <i class="ph-fill ph-star"></i> {{ number_format($profesional->rating, 1) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <a href="{{ route('booking.profesional', $layanan->id) }}" class="text-xs text-soft-brown hover:text-text-dark underline underline-offset-4 font-medium transition-colors">
                            <i class="ph-bold ph-arrow-left inline-block mr-1"></i> Kembali ubah pilihan
                        </a>
                    </div>
                </div>

                <!-- Right Form Area -->
                <div class="md:w-2/3 p-8">
                    <h2 class="text-2xl font-serif text-text-dark mb-6">Tentukan Waktu</h2>
                    
                    <form method="POST" action="{{ route('booking.store') }}" id="bookingForm" class="space-y-6">
                        @csrf
                        <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">
                        <input type="hidden" name="profesional_id" value="{{ $profesional->id }}">
                        
                        <!-- Date Picker -->
                        <div>
                            <label class="block text-sm font-medium text-text-dark mb-2">Tanggal Reservasi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ph ph-calendar-blank text-text-mid text-lg"></i>
                                </div>
                                <input type="date" name="tanggal" id="tanggal" required x-model="tanggal" @change="fetchSlots()"
                                    min="{{ date('Y-m-d') }}"
                                    class="block w-full pl-11 pr-4 py-3 bg-white border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm">
                            </div>
                        </div>

                        <!-- Time Slots -->
                        <div x-show="tanggal" x-cloak>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-text-dark">Waktu Tersedia</label>
                                <span x-show="sisaKuota !== null" class="text-xs font-medium text-soft-brown px-2 py-1 bg-cream rounded-md" x-text="`Sisa Kuota: ${sisaKuota}`"></span>
                            </div>
                            
                            <!-- Loading State -->
                            <div x-show="isLoading" class="flex justify-center items-center py-8">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-soft-brown"></div>
                            </div>
                            
                            <!-- Slots Grid -->
                            <div x-show="!isLoading && slots.length > 0" class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                                <template x-for="slot in slots" :key="slot">
                                    <label class="relative">
                                        <input type="radio" name="jam" :value="slot" x-model="selectedSlot" class="peer sr-only" required>
                                        <div class="px-3 py-2.5 text-center bg-white border border-soft-beige rounded-xl cursor-pointer peer-checked:bg-soft-brown peer-checked:text-white peer-checked:border-soft-brown hover:bg-cream transition-all text-sm font-medium text-text-dark shadow-sm">
                                            <span x-text="slot"></span>
                                        </div>
                                    </label>
                                </template>
                            </div>
                            
                            <!-- Empty State -->
                            <div x-show="!isLoading && allFull" class="text-center py-6 bg-red-50 border border-red-100 rounded-xl">
                                <i class="ph-light ph-calendar-x text-3xl text-red-400 mb-2"></i>
                                <p class="text-sm text-red-600 font-medium" x-text="reason || 'Mohon maaf, semua slot pada tanggal ini sudah penuh.'"></p>
                                <p class="text-xs text-red-500 mt-1">Silakan pilih tanggal lain.</p>
                            </div>
                        </div>

                        <!-- User Details -->
                        <div class="pt-6 border-t border-cream">
                            <h3 class="text-lg font-serif text-text-dark mb-4">Data Pemesan</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-text-dark mb-1.5">Nama Lengkap</label>
                                    <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan', Auth::user()->name) }}" required
                                        class="block w-full px-4 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-text-dark mb-1.5">Nomor WhatsApp</label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}" required
                                        class="block w-full px-4 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm"
                                        placeholder="08123456789">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-text-dark mb-1.5">Catatan Tambahan (Opsional)</label>
                                    <textarea name="catatan" rows="3"
                                        class="block w-full px-4 py-2.5 bg-white border border-soft-beige rounded-xl text-text-dark focus:ring-2 focus:ring-soft-gold focus:border-soft-gold transition-colors shadow-sm"
                                        placeholder="Pesan khusus untuk stylist..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" 
                                    :disabled="!tanggal || !selectedSlot || allFull"
                                    :class="(tanggal && selectedSlot && !allFull) ? 'bg-soft-brown hover:bg-text-dark hover:-translate-y-0.5 shadow-soft text-white' : 'bg-gray-200 text-gray-400 cursor-not-allowed'"
                                    class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl text-base font-medium transition-all duration-300">
                                Konfirmasi & Buat Reservasi
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('bookingForm', () => ({
            tanggal: '{{ old('tanggal') }}',
            selectedSlot: '{{ old('jam') }}',
            slots: [],
            isLoading: false,
            allFull: false,
            reason: '',
            sisaKuota: null,

            init() {
                if(this.tanggal) {
                    this.fetchSlots();
                }
            },

            fetchSlots() {
                if(!this.tanggal) return;
                
                this.isLoading = true;
                this.selectedSlot = '';
                this.slots = [];
                this.allFull = false;
                this.reason = '';
                this.sisaKuota = null;

                fetch('{{ route("booking.slots") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        profesional_id: {{ $profesional->id }},
                        layanan_id: {{ $layanan->id }},
                        tanggal: this.tanggal
                    })
                })
                .then(response => response.json())
                .then(data => {
                    this.slots = data.available_slots || [];
                    this.allFull = data.all_full;
                    if(data.reason) this.reason = data.reason;
                    if(data.sisa_kuota !== undefined) this.sisaKuota = data.sisa_kuota;
                    
                    // Maintain previously selected slot if still available
                    let oldSlot = '{{ old('jam') }}';
                    if (oldSlot && this.slots.includes(oldSlot)) {
                        this.selectedSlot = oldSlot;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.allFull = true;
                    this.reason = 'Terjadi kesalahan saat memuat jadwal.';
                })
                .finally(() => {
                    this.isLoading = false;
                });
            }
        }))
    })
</script>
@endpush
@endsection
