<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seks extends Model
{
    use HasFactory;
    protected $table = 'seks';
    protected $fillable = [
        'nama',
        'kode',
    ];
}
