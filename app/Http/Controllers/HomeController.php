<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Layanan;
use App\Models\Profesional;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = ['hair', 'nail', 'face', 'relaxation'];

        $featuredLayanan = Layanan::available()
            ->orderBy('harga')
            ->limit(8)
            ->get();

        $layananByKategori = [];
        foreach ($kategoris as $k) {
            $layananByKategori[$k] = Layanan::available()->byKategori($k)->get();
        }

        $featuredProfesional = Profesional::available()
            ->orderByDesc('rating')
            ->limit(4)
            ->get();

        $galeri = Galeri::active()->limit(8)->get();

        $testimonials = Testimonial::active()->get();

        return view('welcome', compact(
            'kategoris',
            'featuredLayanan',
            'layananByKategori',
            'featuredProfesional',
            'galeri',
            'testimonials'
        ));
    }
}
