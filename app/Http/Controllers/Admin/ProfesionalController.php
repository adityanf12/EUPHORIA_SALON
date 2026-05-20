<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    public function index()
    {
        $profesional = Profesional::orderBy('spesialisasi')->orderBy('nama')->paginate(15);
        return view('admin.profesional.index', compact('profesional'));
    }

    public function create()
    {
        return view('admin.profesional.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'spesialisasi'     => 'required|string|max:100',
            'pengalaman_tahun' => 'required|integer|min:0',
            'tarif'            => 'required|numeric|min:0',
            'foto'             => 'nullable|string|max:255',
            'rating'           => 'required|numeric|min:1|max:5',
            'bio'              => 'nullable|string',
            'status'           => 'required|in:available,on_leave,unavailable',
            'jadwal_json'      => 'nullable|array',
            'jadwal_json.*'    => 'integer|between:0,6',
        ]);

        Profesional::create($validated);

        return redirect()->route('admin.profesional.index')->with('success', 'Profesional berhasil ditambahkan.');
    }

    public function edit(Profesional $profesional)
    {
        return view('admin.profesional.edit', compact('profesional'));
    }

    public function update(Request $request, Profesional $profesional)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'spesialisasi'     => 'required|string|max:100',
            'pengalaman_tahun' => 'required|integer|min:0',
            'tarif'            => 'required|numeric|min:0',
            'foto'             => 'nullable|string|max:255',
            'rating'           => 'required|numeric|min:1|max:5',
            'bio'              => 'nullable|string',
            'status'           => 'required|in:available,on_leave,unavailable',
            'jadwal_json'      => 'nullable|array',
            'jadwal_json.*'    => 'integer|between:0,6',
        ]);

        $profesional->update($validated);

        return redirect()->route('admin.profesional.index')->with('success', 'Profesional berhasil diperbarui.');
    }

    public function destroy(Profesional $profesional)
    {
        $profesional->delete();
        return redirect()->route('admin.profesional.index')->with('success', 'Profesional berhasil dihapus.');
    }
}
