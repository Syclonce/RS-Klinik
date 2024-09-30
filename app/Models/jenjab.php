<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenjab extends Model
{
    use HasFactory;
    protected $table = 'jenjabs';
    protected $fillable = [
        'kode',
        'nama',
        'tunjangan',
    ];
}
