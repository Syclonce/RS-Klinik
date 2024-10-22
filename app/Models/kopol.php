<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kopol extends Model
{
    use HasFactory;
    protected $table = 'kopols';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
