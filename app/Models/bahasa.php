<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahasa extends Model
{
    use HasFactory;
    protected $table = 'bahasas';
    protected $fillable = [
        'bahasa',
    ];
}
