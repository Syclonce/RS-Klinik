<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkasdigital extends Model
{
    use HasFactory;
    protected $table = 'berkasdigitals';
    protected $fillable = [
        'tanggal',
        'jam',
        'id_rawat',
        'no_rm',
        'kategori',
        'nama',
    ];
}
