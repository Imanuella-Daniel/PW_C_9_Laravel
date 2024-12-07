<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'IDUser';

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
