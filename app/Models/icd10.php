<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class icd10 extends Model
{
    use HasFactory;
    protected $table = 'icd10s';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
