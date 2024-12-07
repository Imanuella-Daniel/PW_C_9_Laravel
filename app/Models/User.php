<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Ganti ini
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user'; // Nama tabel
    protected $primaryKey = 'IDUser'; // Primary key

    protected $fillable = [
        'NamaDepan',
        'NamaBelakang',
        'Email',
        'NoTelepon',
        'Negara',
        'Alamat',
        'Username',
        'Password',
    ];


    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'IDUser');
    }
}
