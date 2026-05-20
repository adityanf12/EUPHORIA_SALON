<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->foreignId('profesional_id')->constrained('profesional')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('jam', 5); // format HH:MM
            $table->enum('status', ['pending', 'confirmed', 'done', 'cancelled'])->default('pending');
            $table->string('nama_pemesan');
            $table->string('no_hp', 20);
            $table->text('catatan')->nullable();
            $table->timestamps();

            // Unique constraint to prevent double booking
            $table->unique(['profesional_id', 'tanggal', 'jam', 'status'], 'unique_booking_slot');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
