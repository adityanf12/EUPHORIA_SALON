<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesional extends Model
{
    protected $table = 'profesional';

    protected $fillable = [
        'nama',
        'spesialisasi',
        'pengalaman_tahun',
        'tarif',
        'foto',
        'rating',
        'bio',
        'status',
        'jadwal_json',
    ];

    protected $casts = [
        'tarif'      => 'decimal:2',
        'rating'     => 'decimal:1',
        'jadwal_json' => 'array',
    ];

    /** Scopes */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeBySpesialisasi($query, string $spesialisasi)
    {
        return $query->where('spesialisasi', $spesialisasi);
    }

    /** Helpers */
    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'available'   => 'Tersedia',
            'on_leave'    => 'Cuti',
            'unavailable' => 'Tidak Tersedia',
            default       => ucfirst($this->status),
        };
    }

    public function getSpesialisasiLabelAttribute(): string
    {
        return match($this->spesialisasi) {
            'hair'       => 'Hair Stylist',
            'nail'       => 'Nail Artist',
            'face'       => 'Facial Therapist',
            'relaxation' => 'Spa Therapist',
            // legacy
            'kuku'   => 'Nail Artist',
            'facial' => 'Facial Therapist',
            default  => ucfirst($this->spesialisasi),
        };
    }

    public function getTarifFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->tarif, 0, ',', '.');
    }

    public function getStarsAttribute(): string
    {
        $full  = (int) floor($this->rating);
        $half  = ($this->rating - $full) >= 0.5 ? 1 : 0;
        $empty = 5 - $full - $half;
        return str_repeat('★', $full) . str_repeat('⯨', $half) . str_repeat('☆', $empty);
    }

    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class, 'profesional_id');
    }
}
