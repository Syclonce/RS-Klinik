<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelaskamar extends Model
{
    use HasFactory;
    protected $table = 'kelaskamars';
    protected $fillable = [
        'nama',
        'status',
    ];
}
