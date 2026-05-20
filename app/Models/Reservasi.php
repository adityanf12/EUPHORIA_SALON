<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservasi extends Model
{
    protected $table = 'reservasi';

    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_DONE = 'done';
    const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'user_id',
        'layanan_id',
        'profesional_id',
        'tanggal',
        'jam',
        'status',
        'nama_pemesan',
        'no_hp',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function profesional(): BelongsTo
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

    /**
     * Check if a time slot is available for a professional on a given date
     */
    public static function isSlotAvailable(int $profesionalId, string $tanggal, string $jam): bool
    {
        return !static::where('profesional_id', $profesionalId)
            ->where('tanggal', $tanggal)
            ->where('jam', $jam)
            ->whereIn('status', [self::STATUS_PENDING, self::STATUS_CONFIRMED])
            ->exists();
    }

    /**
     * Get booked slots for a professional on a given date
     */
    public static function getBookedSlots(int $profesionalId, string $tanggal): array
    {
        return static::where('profesional_id', $profesionalId)
            ->where('tanggal', $tanggal)
            ->whereIn('status', [self::STATUS_PENDING, self::STATUS_CONFIRMED])
            ->pluck('jam')
            ->toArray();
    }
}
