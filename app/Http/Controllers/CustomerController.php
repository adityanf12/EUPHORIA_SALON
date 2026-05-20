<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /** Display customer profile */
    public function profile()
    {
        $user = Auth::user();
        return view('customer.profile', compact('user'));
    }

    /** Update customer profile */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    /** Display customer reservation history */
    public function history(Request $request)
    {
        $query = Reservasi::where('user_id', Auth::id())
                    ->with(['layanan', 'profesional']);
                    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $reservasi = $query->orderBy('tanggal', 'desc')
                           ->orderBy('jam', 'desc')
                           ->paginate(10)
                           ->withQueryString();

        return view('customer.history', compact('reservasi'));
    }
}
