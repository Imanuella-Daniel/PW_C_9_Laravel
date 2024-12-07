<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'NoTransaksi';
    public $timestamps = false;

    protected $fillable = [
        'IDUser',
        'TanggalPembayaran',
        'MetodePembayaran',
        'NoKartu',
        'BiayaKamar',
        'Status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'IDUser');
    }

    public function pemesananKamar()
    {
        return $this->hasMany(PemesananKamar::class, 'NoTransaksi');
    }

    public function pemesananFasilitas()
    {
        return $this->hasMany(PemesananFasilitas::class, 'NoTransaksi');
    }
}
