<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depart extends Model
{
    use HasFactory;
    protected $table = 'departs';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
