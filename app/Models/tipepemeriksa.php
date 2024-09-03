<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipepemeriksa extends Model
{
    use HasFactory;
    protected $table = 'tipepemeriksas';
    protected $fillable = [
        'nama',
    ];
}
