<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bangsa extends Model
{
    use HasFactory;
    protected $table = 'bangsas';
    protected $fillable = [
        'nama_bangsa',
    ];
}
