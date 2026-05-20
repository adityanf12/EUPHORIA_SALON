<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'nama'         => 'Anindita Rahma',
                'avatar'       => 'https://ui-avatars.com/api/?name=Anindita+Rahma&background=D9B8A8&color=8B6B61&size=200',
                'rating'       => 5,
                'komentar'     => 'Pengalaman yang luar biasa! Rambut saya terasa lebih hidup dan berkilau setelah hair spa. Staff sangat ramah dan profesional.',
                'layanan_label'=> 'Hair Spa & Mask',
                'is_active'    => true,
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'nama'         => 'Bella Oktaviani',
                'avatar'       => 'https://ui-avatars.com/api/?name=Bella+Oktaviani&background=E8D8C8&color=8B6B61&size=200',
                'rating'       => 5,
                'komentar'     => 'Nail art di sini selalu hasilnya bagus banget! Maya sangat kreatif dan sabar. Sudah langganan 2 tahun.',
                'layanan_label'=> 'Nail Art Premium',
                'is_active'    => true,
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'nama'         => 'Clarissa Dewi',
                'avatar'       => 'https://ui-avatars.com/api/?name=Clarissa+Dewi&background=D9B8A8&color=8B6B61&size=200',
                'rating'       => 5,
                'komentar'     => 'Facial treatment terbaik yang pernah saya coba. Kulit terasa bersih dan glowing. Dr. Fitri sangat informatif.',
                'layanan_label'=> 'Anti-Aging Facial',
                'is_active'    => true,
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'nama'         => 'Dinda Maharani',
                'avatar'       => 'https://ui-avatars.com/api/?name=Dinda+Maharani&background=C6A27E&color=fff&size=200',
                'rating'       => 5,
                'komentar'     => 'Aromatherapy spa di sini bikin jiwa raga relaks total. Suasananya tenang dan mewah. Wajib datang lagi!',
                'layanan_label'=> 'Aromatherapy Spa',
                'is_active'    => true,
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'nama'         => 'Eka Fitriani',
                'avatar'       => 'https://ui-avatars.com/api/?name=Eka+Fitriani&background=8B6B61&color=fff&size=200',
                'rating'       => 4,
                'komentar'     => 'Booking sangat mudah dan cepat. Sarah melakukan keratin treatment dengan sangat baik. Hasilnya bertahan lama!',
                'layanan_label'=> 'Keratin Treatment',
                'is_active'    => true,
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'nama'         => 'Farida Kusuma',
                'avatar'       => 'https://ui-avatars.com/api/?name=Farida+Kusuma&background=D9B8A8&color=8B6B61&size=200',
                'rating'       => 5,
                'komentar'     => 'Makeup pengantin saya sungguh memukau! Nadia sangat detail dan hasilnya fotogenik. Semua tamu memuji.',
                'layanan_label'=> 'Bridal Makeup',
                'is_active'    => true,
                'created_at'   => now(), 'updated_at' => now(),
            ],
        ];

        DB::table('testimonial')->insert($testimonials);
    }
}
