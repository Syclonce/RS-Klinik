<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
