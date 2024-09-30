<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ok extends Model
{
    use HasFactory;
    protected $table = 'oks';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
