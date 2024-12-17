<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananKamar extends Model
{
    use HasFactory;

    protected $table = 'pemesanankamar';
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

    public function user()
    {
        return $this->belongsTo(User::class, 'IDUser', 'IDUser');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'NoTransaksi');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'NoKamar');
    }
}