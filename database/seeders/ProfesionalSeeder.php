<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionalSeeder extends Seeder
{
    public function run(): void
    {
        $profesional = [
            // ─── HAIR STYLISTS ──────────────────────────────────────────
            [
                'nama'            => 'Sarah Wijaya',
                'spesialisasi'    => 'hair',
                'pengalaman_tahun'=> 8,
                'tarif'           => 150000,
                'foto'            => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=400&q=80',
                'rating'          => 4.9,
                'bio'             => 'Spesialis teknik pewarnaan balayage & ombre. Lulusan terbaik dari L\'Oréal Professional Academy Jakarta.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 2, 3, 4, 5]),
                'created_at'      => now(), 'updated_at' => now(),
            ],
            [
                'nama'            => 'Diana Putri',
                'spesialisasi'    => 'hair',
                'pengalaman_tahun'=> 5,
                'tarif'           => 120000,
                'foto'            => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80',
                'rating'          => 4.7,
                'bio'             => 'Ahli potong rambut modern & classic. Berpengalaman menangani berbagai tekstur rambut Asia.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 2, 3, 5, 6]),
                'created_at'      => now(), 'updated_at' => now(),
            ],
            [
                'nama'            => 'Rina Kusuma',
                'spesialisasi'    => 'hair',
                'pengalaman_tahun'=> 12,
                'tarif'           => 200000,
                'foto'            => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&q=80',
                'rating'          => 5.0,
                'bio'             => 'Senior hair artist berpengalaman 12 tahun. Spesialis smoothing, keratin, dan rebonding berkualitas premium.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([2, 3, 4, 5, 6]),
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ─── NAIL ARTISTS ───────────────────────────────────────────
            [
                'nama'            => 'Maya Sari',
                'spesialisasi'    => 'nail',
                'pengalaman_tahun'=> 6,
                'tarif'           => 100000,
                'foto'            => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400&q=80',
                'rating'          => 4.8,
                'bio'             => 'Nail artist creative dengan keahlian 3D nail art dan nail extension. Setiap kuku adalah karya seni.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 2, 3, 4, 5, 6]),
                'created_at'      => now(), 'updated_at' => now(),
            ],
            [
                'nama'            => 'Lisa Permata',
                'spesialisasi'    => 'nail',
                'pengalaman_tahun'=> 4,
                'tarif'           => 85000,
                'foto'            => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&q=80',
                'rating'          => 4.6,
                'bio'             => 'Spesialis manicure & pedicure spa dengan sentuhan lembut dan detail yang sempurna.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 3, 4, 5, 6]),
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ─── FACIAL THERAPISTS ──────────────────────────────────────
            [
                'nama'            => 'Dr. Fitri Handayani',
                'spesialisasi'    => 'face',
                'pengalaman_tahun'=> 12,
                'tarif'           => 250000,
                'foto'            => 'https://images.unsplash.com/photo-1487412947147-5cebf100d281?w=400&q=80',
                'rating'          => 5.0,
                'bio'             => 'Dokter kecantikan bersertifikat dengan keahlian perawatan kulit medis dan anti-aging. Konsultasi kulit gratis.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 2, 4, 5]),
                'created_at'      => now(), 'updated_at' => now(),
            ],
            [
                'nama'            => 'Nadia Rahmawati',
                'spesialisasi'    => 'face',
                'pengalaman_tahun'=> 7,
                'tarif'           => 180000,
                'foto'            => 'https://images.unsplash.com/photo-1542206395-9feb3edaa68d?w=400&q=80',
                'rating'          => 4.8,
                'bio'             => 'Makeup artist & facial therapist dengan spesialisasi eyelash extension dan brow styling terkini.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 2, 3, 4, 5, 6]),
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ─── SPA THERAPISTS ─────────────────────────────────────────
            [
                'nama'            => 'Dewi Anggraini',
                'spesialisasi'    => 'relaxation',
                'pengalaman_tahun'=> 9,
                'tarif'           => 220000,
                'foto'            => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=400&q=80',
                'rating'          => 4.9,
                'bio'             => 'Certified spa therapist dari Bali Spa Academy. Ahli dalam aromatherapy, hot stone, dan Swedish massage.',
                'status'          => 'available',
                'jadwal_json'     => json_encode([1, 2, 3, 4, 5]),
                'created_at'      => now(), 'updated_at' => now(),
            ],
            [
                'nama'            => 'Reni Maharani',
                'spesialisasi'    => 'relaxation',
                'pengalaman_tahun'=> 5,
                'tarif'           => 180000,
                'foto'            => 'https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?w=400&q=80',
                'rating'          => 4.7,
                'bio'             => 'Terapis spa dengan keahlian deep tissue massage dan terapi relaksasi holistik.',
                'status'          => 'on_leave',
                'jadwal_json'     => json_encode([2, 3, 4, 5, 6]),
                'created_at'      => now(), 'updated_at' => now(),
            ],
        ];

        DB::table('profesional')->insert($profesional);
    }
}
