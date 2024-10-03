<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class radiologi extends Model
{
    use HasFactory;
    protected $table = 'radiologis';
    protected $fillable = [
        'tanggal_lahir',
        'time',
        'doctor_id',
        'penjab_id',
        'no_reg',
        'no_rawat',
        'no_rm',
        'pasien_id',
        'seks',
        'telepon',
        'tgl_kunjungan',
    ];

    public function pasien()
    {
        return $this->belongsTo(pasien::class,'no_rm','no_rm');
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }
}
