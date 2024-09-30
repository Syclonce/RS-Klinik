<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statker extends Model
{
    use HasFactory;
    protected $table = 'statkers';
    protected $fillable = [
        'status',
        'keterangan',
        'index',
    ];
}
