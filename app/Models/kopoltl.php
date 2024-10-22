<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kopoltl extends Model
{
    use HasFactory;
    protected $table = 'kopoltls';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
