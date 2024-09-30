<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emergency extends Model
{
    use HasFactory;
    protected $table = 'emergencies';
    protected $fillable = [
        'kode',
        'nama',
        'status',
    ];
}
