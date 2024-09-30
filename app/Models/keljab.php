<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keljab extends Model
{
    use HasFactory;
    protected $table = 'keljabs';
    protected $fillable = [
        'kode',
        'nama',
        'status',
    ];
}
