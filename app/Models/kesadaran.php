<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kesadaran extends Model
{
    use HasFactory;
    protected $table = 'kesadarans';
    protected $fillable = [
        'kode',
        'nama',
    ];
}


