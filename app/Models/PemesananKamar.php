<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananKamar extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_kamar';
    protected $primaryKey = 'IDPesanan';
    public $timestamps = false;

    protected $fillable = [
        'NoTransaksi',
        'NoKamar',
        'TanggalPesan',
        'JumlahDewasa',
        'JumlahAnak',
        'PermintaanKhusus',
        'TanggalCheckIn',
        'TanggalCheckOut'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'NoTransaksi');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'NoKamar');
    }
}
