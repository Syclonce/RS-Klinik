<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obtadpho extends Model
{
    use HasFactory;
    protected $table = 'obtadphos';
    protected $fillable = [
        'nama',
        'kode',
        'Kesediaan'
    ];
}

