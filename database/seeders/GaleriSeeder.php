<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeri = [
            ['judul' => 'Hair Coloring Art',    'gambar' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80', 'deskripsi' => 'Balayage & ombre terbaik',   'urutan' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Nail Art Collection',  'gambar' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?w=800&q=80', 'deskripsi' => 'Desain kuku eksklusif',     'urutan' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Luxury Facial',        'gambar' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=800&q=80', 'deskripsi' => 'Perawatan wajah premium',    'urutan' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Spa Relaxation',       'gambar' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=800&q=80', 'deskripsi' => 'Ritual spa eksklusif',      'urutan' => 4, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Bridal Makeup',        'gambar' => 'https://images.unsplash.com/photo-1487412947147-5cebf100d281?w=800&q=80', 'deskripsi' => 'Riasan pengantin impian',   'urutan' => 5, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Hair Spa Treatment',   'gambar' => 'https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?w=800&q=80', 'deskripsi' => 'Perawatan rambut premium',  'urutan' => 6, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Eyelash Extension',    'gambar' => 'https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?w=800&q=80', 'deskripsi' => 'Extension natural sempurna', 'urutan' => 7, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Aromatherapy Session', 'gambar' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=800&q=80', 'deskripsi' => 'Spa aromaterapi holistik',  'urutan' => 8, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('galeri')->insert($galeri);
    }
}
