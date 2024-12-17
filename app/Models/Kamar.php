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
        'Kapasitas',
        'JumlahKamar',
        'HargaKamar',
        'Desc',
        'Facility',
        'Status',
        'photo',
        'Rating'
    ];

    public function reservations()
    {
        return $this->hasMany(PemesananKamar::class, 'NoKamar', 'NoKamar');
    }

    public function pemesanankamar()
    {
        return $this->hasMany(PemesananKamar::class, 'NoKamar');
    }

}
