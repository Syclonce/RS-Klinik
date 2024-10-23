<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khusus extends Model
{
    use HasFactory;
    protected $table = 'khususes';
    protected $fillable = [
        'nama',
        'kode',
    ];
}
