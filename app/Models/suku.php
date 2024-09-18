<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suku extends Model
{
    use HasFactory;
    protected $table = 'sukus';
    protected $fillable = [
        'nama_suku',
    ];

}
