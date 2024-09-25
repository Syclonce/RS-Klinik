<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statdok extends Model
{
    use HasFactory;
    protected $table = 'statdoks';
    protected $fillable = [
        'nama',
    ];

    public function doctor()
    {
        return $this->hasOne(doctor::class);
    }
}
