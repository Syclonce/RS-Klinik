<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labdata extends Model
{
    use HasFactory;
    protected $table = 'labdatas';
    protected $fillable = [
        'tanggal_lahir',
        'time',
        'doctor_id',
        'penjab_id',
        'no_reg',
        'no_rawat',
        'no_rm',
        'nama_pasien',
        'seks',
        'alamat',
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
