<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'kategori',
        'deskripsi',
        'durasi_menit',
        'harga',
        'gambar',
        'status',
        'kuota_harian',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    /** Scopes */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeByKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori);
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
            'unavailable' => 'Tidak Tersedia',
            'closed'      => 'Tutup',
            default       => ucfirst($this->status),
        };
    }

    public function getKategoriLabelAttribute(): string
    {
        return match($this->kategori) {
            'hair'       => 'Hair',
            'nail'       => 'Nail',
            'face'       => 'Face & Beauty',
            'relaxation' => 'Relaxation',
            // legacy
            'kuku'   => 'Nail',
            'facial' => 'Face & Beauty',
            default  => ucfirst($this->kategori),
        };
    }

    public function getHargaFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function getDurasiFormattedAttribute(): string
    {
        $hours = intdiv($this->durasi_menit, 60);
        $minutes = $this->durasi_menit % 60;
        if ($hours > 0 && $minutes > 0) {
            return "{$hours}j {$minutes}m";
        }
        if ($hours > 0) {
            return "{$hours} jam";
        }
        return "{$minutes} menit";
    }

    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class, 'layanan_id');
    }
}
