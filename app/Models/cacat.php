<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cacat extends Model
{
    use HasFactory;
    protected $table = 'cacats';
    protected $fillable = [
        'kode_cacat',
        'nama_cacat',
    ];
}
