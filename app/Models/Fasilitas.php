<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $primaryKey = 'IDFasilitas';

    public $incrementing = true;

    protected $fillable = [
        'IDFasilitas',
        'NamaFasilitas',
        'HargaFasilitas',
        'Deskripsi',
        'Fasilitas',
        'Status',
        'Rating',
        'Gambar',
    ];

    public function pemesananFasilitas()
    {
        return $this->hasMany(PemesananFasilitas::class, 'IDFasilitas', 'IDFasilitas');
    }
}
