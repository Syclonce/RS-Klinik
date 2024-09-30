<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metcik extends Model
{
    use HasFactory;
    protected $table = 'metciks';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
