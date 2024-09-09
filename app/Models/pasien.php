<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = [
        'nama',
        'Alamat',
        'tgl',
        'doctor_id',
        'telepon',
        'seks',
        'goldar_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function goldar()
    {
        return $this->belongsTo(goldar::class);
    }

    public function laptes()
    {
        return $this->hasOne(laptes::class);
    }
}
