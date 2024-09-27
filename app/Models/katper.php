<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class katper extends Model
{
    use HasFactory;
    protected $table = 'katpers';
    protected $fillable = [
        'kode_rawatan',
        'nama_rawatan',
    ];
}
