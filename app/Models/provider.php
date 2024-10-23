<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;
    protected $table = 'providers';
    protected $fillable = [
        'kode',
        'nama',
    ];
}


