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
        'Floor',
        'Facility',
        'Status',
        'Rating',
        'Deskripsi',
        'Gambar'
    ];

    public function pemesananKamar()
    {
        return $this->hasMany(PemesananKamar::class, 'NoKamar');
    }
}
