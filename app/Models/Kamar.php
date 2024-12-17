<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = 'NoKamar';
    public $timestamps = false;

    protected $fillable = [
        'NoKamar',
        'TipeKamar',
        'HargaKamar',
        'Kapasitas',
        'JumlahKamar',
        'Desc',
        'Facility',
        'Status',
        'photo'
    ];

    public function reservations()
    {
        return $this->hasMany(PemesananKamar::class, 'NoKamar', 'NoKamar');
    }
}
