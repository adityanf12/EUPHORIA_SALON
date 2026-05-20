<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderByDesc('created_at')->paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'avatar'        => 'nullable|string',
            'rating'        => 'required|integer|min:1|max:5',
            'komentar'      => 'required|string',
            'layanan_label' => 'nullable|string|max:255',
            'is_active'     => 'boolean',
        ]);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'avatar'        => 'nullable|string',
            'rating'        => 'required|integer|min:1|max:5',
            'komentar'      => 'required|string',
            'layanan_label' => 'nullable|string|max:255',
            'is_active'     => 'boolean',
        ]);

        $testimonial->update($validated);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
