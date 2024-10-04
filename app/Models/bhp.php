<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bhp extends Model
{
    use HasFactory;
    protected $table = 'bhps';
    protected $fillable = [
        'kode',
        'nama',
        'harga_dasar',
        'harga_beli',
        'expired',
    ];

}
