<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spesiali extends Model
{
    use HasFactory;
    protected $table = 'spesialis';
    protected $fillable = [
        'nama',
        'kode',
    ];
}
