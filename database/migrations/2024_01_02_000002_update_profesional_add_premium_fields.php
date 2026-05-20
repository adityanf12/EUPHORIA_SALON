<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Change spesialisasi from potential enum to string
        DB::statement("ALTER TABLE profesional MODIFY COLUMN spesialisasi VARCHAR(100) NOT NULL");

        Schema::table('profesional', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('spesialisasi');
            $table->decimal('rating', 3, 1)->default(5.0)->after('foto');
            $table->text('bio')->nullable()->after('rating');
            $table->enum('status', ['available', 'on_leave', 'unavailable'])->default('available')->after('bio');
            $table->json('jadwal_json')->nullable()->after('status')
                  ->comment('Available days: [1,2,3,4,5] = Mon-Fri');
        });
    }

    public function down(): void
    {
        Schema::table('profesional', function (Blueprint $table) {
            $table->dropColumn(['foto', 'rating', 'bio', 'status', 'jadwal_json']);
        });
    }
};
