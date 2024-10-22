<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class icd10_bpjs extends Model
{
    use HasFactory;
    protected $table = 'icd10_ss';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
