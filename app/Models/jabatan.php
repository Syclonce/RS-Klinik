<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $fillable = [
        'nama',
    ];

    public function doctor()
    {
        return $this->hasOne(doctor::class);
    }
}
