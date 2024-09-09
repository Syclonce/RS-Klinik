<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obatk extends Model
{
    use HasFactory;
    protected $table = 'obatks';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
}
