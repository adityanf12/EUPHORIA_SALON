<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Change kategori from enum to string using raw SQL (MySQL compatible)
        DB::statement("ALTER TABLE layanan MODIFY COLUMN kategori VARCHAR(50) NOT NULL DEFAULT 'hair'");

        Schema::table('layanan', function (Blueprint $table) {
            $table->decimal('harga', 12, 2)->default(0)->after('durasi_menit');
            $table->string('gambar')->nullable()->after('harga');
            $table->enum('status', ['available', 'unavailable', 'closed'])->default('available')->after('gambar');
            $table->integer('kuota_harian')->default(10)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('layanan', function (Blueprint $table) {
            $table->dropColumn(['harga', 'gambar', 'status', 'kuota_harian']);
        });
        DB::statement("ALTER TABLE layanan MODIFY COLUMN kategori ENUM('hair','kuku','facial') NOT NULL");
    }
};
