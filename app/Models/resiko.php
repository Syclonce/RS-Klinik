<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resiko extends Model
{
    use HasFactory;
    protected $table = 'resikos';
    protected $fillable = [
        'kode',
        'nama',
        'index',
    ];
}
