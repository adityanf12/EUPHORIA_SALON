<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Profesional;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    private array $allSlots = [
        '09:00','10:00','11:00','12:00',
        '13:00','14:00','15:00','16:00','17:00',
    ];

    /** Public: list layanan dengan filter kategori */
    public function layanan(Request $request)
    {
        $kategoris = ['hair', 'nail', 'face', 'relaxation'];
        $kategori  = $request->query('kategori');

        $query = Layanan::query();
        if ($kategori && in_array($kategori, $kategoris)) {
            $query->where('kategori', $kategori);
        }

        $layanan = $query->orderBy('kategori')->orderBy('nama_layanan')->get();

        return view('booking.layanan', compact('layanan', 'kategoris', 'kategori'));
    }

    /** Step 2: pilih profesional */
    public function pilihProfesional(Layanan $layanan)
    {
        if (! $layanan->isAvailable()) {
            return redirect()->route('layanan')
                ->with('error', "Layanan \"{$layanan->nama_layanan}\" sedang tidak tersedia.");
        }

        // Match spesialisasi profesional dengan kategori layanan
        $profesionals = Profesional::where('spesialisasi', $layanan->kategori)
            ->orderByDesc('rating')
            ->get();

        return view('booking.profesional', compact('layanan', 'profesionals'));
    }

    /** Step 3: form reservasi */
    public function reservasi(Layanan $layanan, Profesional $profesional)
    {
        if (! $layanan->isAvailable()) {
            return redirect()->route('layanan')
                ->with('error', 'Layanan ini sedang tidak tersedia.');
        }

        return view('booking.reservasi', compact('layanan', 'profesional'));
    }

    /** AJAX: get available slots */
    public function getAvailableSlots(Request $request)
    {
        $request->validate([
            'profesional_id' => 'required|exists:profesional,id',
            'tanggal'        => 'required|date|after_or_equal:today',
        ]);

        $profesional = Profesional::findOrFail($request->profesional_id);

        if (! $profesional->isAvailable()) {
            return response()->json([
                'available_slots' => [],
                'booked_slots'    => [],
                'all_full'        => true,
                'reason'          => 'Profesional sedang tidak tersedia.',
            ]);
        }

        $layananId  = $request->layanan_id;
        $kuotaHarian = 99;
        if ($layananId) {
            $layanan = Layanan::find($layananId);
            if ($layanan) {
                $kuotaHarian = $layanan->kuota_harian;
            }
        }

        $bookedCount = Reservasi::where('tanggal', $request->tanggal)
            ->whereIn('status', [Reservasi::STATUS_PENDING, Reservasi::STATUS_CONFIRMED])
            ->when($layananId, fn($q) => $q->where('layanan_id', $layananId))
            ->count();

        if ($kuotaHarian > 0 && $bookedCount >= $kuotaHarian) {
            return response()->json([
                'available_slots' => [],
                'booked_slots'    => $this->allSlots,
                'all_full'        => true,
                'reason'          => 'Kuota harian untuk layanan ini sudah penuh.',
                'sisa_kuota'      => 0,
            ]);
        }

        $bookedSlots    = Reservasi::getBookedSlots($request->profesional_id, $request->tanggal);
        $availableSlots = array_values(array_diff($this->allSlots, $bookedSlots));

        return response()->json([
            'available_slots' => $availableSlots,
            'booked_slots'    => $bookedSlots,
            'all_full'        => empty($availableSlots),
            'sisa_kuota'      => max(0, $kuotaHarian - $bookedCount),
        ]);
    }

    /** Step 4: simpan reservasi */
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id'    => 'required|exists:layanan,id',
            'profesional_id'=> 'required|exists:profesional,id',
            'tanggal'       => 'required|date|after_or_equal:today',
            'jam'           => 'required|in:' . implode(',', $this->allSlots),
            'nama_pemesan'  => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
            'catatan'       => 'nullable|string|max:500',
        ]);

        $layanan     = Layanan::findOrFail($request->layanan_id);
        $profesional = Profesional::findOrFail($request->profesional_id);

        if (! $layanan->isAvailable()) {
            return back()->withInput()
                ->withErrors(['booking' => 'Layanan ini sedang tidak tersedia.']);
        }

        if (! $profesional->isAvailable()) {
            return back()->withInput()
                ->withErrors(['booking' => 'Profesional ini sedang tidak tersedia.']);
        }

        try {
            $reservasi = DB::transaction(function () use ($request, $layanan) {
                $exists = Reservasi::where('profesional_id', $request->profesional_id)
                    ->where('tanggal', $request->tanggal)
                    ->where('jam', $request->jam)
                    ->whereIn('status', [Reservasi::STATUS_PENDING, Reservasi::STATUS_CONFIRMED])
                    ->lockForUpdate()
                    ->exists();

                if ($exists) {
                    throw new \Exception('Slot sudah tidak tersedia. Silakan pilih waktu lain.');
                }

                return Reservasi::create([
                    'user_id'        => Auth::id(),
                    'layanan_id'     => $request->layanan_id,
                    'profesional_id' => $request->profesional_id,
                    'tanggal'        => $request->tanggal,
                    'jam'            => $request->jam,
                    'status'         => Reservasi::STATUS_PENDING,
                    'nama_pemesan'   => $request->nama_pemesan,
                    'no_hp'          => $request->no_hp,
                    'catatan'        => $request->catatan,
                ]);
            });

            return redirect()->route('booking.sukses', $reservasi->id)
                ->with('success', 'Reservasi berhasil dibuat!');

        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['booking' => $e->getMessage()]);
        }
    }

    /** Step 5: halaman sukses */
    public function sukses(Reservasi $reservasi)
    {
        if ($reservasi->user_id !== Auth::id()) {
            abort(403);
        }

        $reservasi->load(['layanan', 'profesional']);

        return view('booking.sukses', compact('reservasi'));
    }
}
