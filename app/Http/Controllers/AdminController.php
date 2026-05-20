<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Layanan;
use App\Models\Profesional;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /** Display admin dashboard with statistics */
    public function dashboard()
    {
        $today = Carbon::today();
        
        $totalReservasi = Reservasi::count();
        $reservasiHariIni = Reservasi::whereDate('tanggal', $today)->count();
        $reservasiPending = Reservasi::where('status', Reservasi::STATUS_PENDING)->count();
        $reservasiConfirmed = Reservasi::where('status', Reservasi::STATUS_CONFIRMED)->count();
        
        $totalCustomer = User::where('role', 'user')->count();
        $totalLayanan = Layanan::count();
        $totalProfesional = Profesional::count();

        // Jadwal Hari Ini
        $jadwalHariIni = Reservasi::with(['user', 'layanan', 'profesional'])
            ->whereDate('tanggal', $today)
            ->whereIn('status', [Reservasi::STATUS_PENDING, Reservasi::STATUS_CONFIRMED])
            ->orderBy('jam')
            ->get();

        // Recent reservations
        $recentReservasi = Reservasi::with(['user', 'layanan', 'profesional'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalReservasi',
            'reservasiHariIni',
            'reservasiPending',
            'reservasiConfirmed',
            'totalCustomer',
            'totalLayanan',
            'totalProfesional',
            'jadwalHariIni',
            'recentReservasi'
        ));
    }

    /** Display all reservations with filters */
    public function reservasi(Request $request)
    {
        $query = Reservasi::with(['user', 'layanan', 'profesional']);

        // Filter by date
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by search keyword
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemesan', 'like', "%{$search}%")
                  ->orWhereHas('layanan', function ($q2) use ($search) {
                      $q2->where('nama_layanan', 'like', "%{$search}%");
                  })
                  ->orWhereHas('profesional', function ($q2) use ($search) {
                      $q2->where('nama', 'like', "%{$search}%");
                  });
            });
        }

        $reservasi = $query->orderBy('tanggal', 'desc')
            ->orderBy('jam', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.reservasi', compact('reservasi'));
    }

    /** Update reservation status */
    public function updateStatus(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,done,cancelled',
        ]);

        $reservasi->update([
            'status' => $request->status,
        ]);

        return back()->with('success', "Status reservasi #{$reservasi->id} berhasil diubah menjadi " . ucfirst($request->status) . ".");
    }
}
