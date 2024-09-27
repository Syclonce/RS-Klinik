<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class katpen extends Model
{
    use HasFactory;
    protected $table = 'katpens';
    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'ciri',
    ];
}
