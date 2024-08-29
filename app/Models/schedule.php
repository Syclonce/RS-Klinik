<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = [
        'doctor_id',
        'hari',
        'awal',
        'akhir',
        'menit',
    ];
    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
