<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rajal extends Model
{
    use HasFactory;
    protected $table = 'rajals';
    protected $fillable = [
        'tgl_kunjungan',
        'time',
        'doctor_id',
        'poli_id',
        'penjab_id',
        'no_reg',
        'no_rawat',
        'no_rm',
        'nama_pasien',
        'tgl_lahir',
        'seks',
        'telepon',
    ];

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function poli()
    {
        return $this->belongsTo(poli::class);
    }

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }

    public function pasien()
    {
        return $this->belongsTo(pasien::class,'no_rm','no_rm');
    }
}
