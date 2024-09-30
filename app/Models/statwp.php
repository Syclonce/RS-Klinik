<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statwp extends Model
{
    use HasFactory;
    protected $table = 'statwps';
    protected $fillable = [
        'status',
        'keterangan',
    ];
}
