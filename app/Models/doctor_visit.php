<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_visit extends Model
{
    use HasFactory;
    protected $table = 'doctor_visits';
    protected $fillable = [
        'doctor_id',
        'deskripsi',
        'harga',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
