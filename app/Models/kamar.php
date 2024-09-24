<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars';
    protected $fillable = [
        'nama_kamar',
        'nomor_bed',
        'harga',
        'status',

    ];
}
