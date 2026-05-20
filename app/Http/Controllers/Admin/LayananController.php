<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::orderBy('kategori')->orderBy('nama_layanan')->paginate(15);
        return view('admin.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori'     => 'required|string|max:50',
            'deskripsi'    => 'required|string',
            'durasi_menit' => 'required|integer|min:15',
            'harga'        => 'required|numeric|min:0',
            'gambar'       => 'nullable|string|max:255',
            'status'       => 'required|in:available,unavailable,closed',
            'kuota_harian' => 'required|integer|min:0',
        ]);

        Layanan::create($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori'     => 'required|string|max:50',
            'deskripsi'    => 'required|string',
            'durasi_menit' => 'required|integer|min:15',
            'harga'        => 'required|numeric|min:0',
            'gambar'       => 'nullable|string|max:255',
            'status'       => 'required|in:available,unavailable,closed',
            'kuota_harian' => 'required|integer|min:0',
        ]);

        $layanan->update($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

    public function toggleStatus(Request $request, Layanan $layanan)
    {
        $status = $layanan->status === 'available' ? 'unavailable' : 'available';
        $layanan->update(['status' => $status]);
        
        return back()->with('success', "Status layanan diubah menjadi {$status}.");
    }
}
