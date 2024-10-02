<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class radiologi extends Model
{
    use HasFactory;
    protected $table = 'radiologis';
    protected $fillable = [
        'tanggal_lahir',
        'time',
        'nama',
        'doctor_id',
        'penjab_id',
        'no_reg',
        'no_rawat',
    ];
}
