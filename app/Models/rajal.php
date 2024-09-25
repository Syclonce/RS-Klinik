<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rajal extends Model
{
    use HasFactory;
    protected $table = 'rajals';
    protected $fillable = [
        'no_rm',
        'nama',
        'sex',
        'ktp',
        'satusehat',
        'tanggal_lahir',
        'umur',
        'alamat',
        'tglpol',
        'poli',
        'dokter',
        'id_dokter',
        'pembayaran',
        'nomber',
    ];
}
