<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananFasilitas extends Model
{
    use HasFactory;

    protected $table = 'pemesananfasilitas';
    protected $primaryKey = 'IDFasilitas';
    public $timestamps = false;

    protected $fillable = [
        'NoTransaksi',
        'NamaFasilitas',
        'Deskripsi',
        'Biaya'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'NoTransaksi');
    }
}
