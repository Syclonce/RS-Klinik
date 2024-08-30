<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liburan extends Model
{
    use HasFactory;
    protected $table = 'liburans';
    protected $fillable = [
        'doctor_id',
        'liburan',
    ];
    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
