<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjamin extends Model
{
    use HasFactory;
    protected $table = 'penjamins';
    protected $fillable = [
        'jenis',
        'nama',
        'verifikasi',
        'filter',
        'awal',
        'akhir',
        'alamat',
        'telepon',
        'fakes',
        'contact',
        'telp',
        'hp',
        'jabatan',
        'akun',
        'cabang',
        'rek',
    ];
}
