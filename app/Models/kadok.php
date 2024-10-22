<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kadok extends Model
{
    use HasFactory;
    protected $table = 'kadoks';
    protected $fillable = [
        'kode',
        'nama',
    ];
}
