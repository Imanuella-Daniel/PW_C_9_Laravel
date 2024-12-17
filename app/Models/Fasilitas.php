<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'fasilitas';

    // Define the primary key
    protected $primaryKey = 'IDFasilitas';

    // Set to false if the primary key is not auto-incrementing
    public $incrementing = true;

    // Define the fields that are mass assignable
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
