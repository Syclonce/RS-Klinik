<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    use HasFactory;
    protected $table = 'polis';
    protected $fillable = [
        'nama_poli',
        'deskripsi',
        'status',
    ];
}
