<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opname extends Model
{
    use HasFactory;
    protected $table = 'opnames';
    protected $fillable = [
        'kode',
        'nama',
        'harga_dasar',
        'harga_beli',
        'expired',
    ];
}
