<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ranap extends Model
{
    use HasFactory;
    protected $table = 'ranaps';
    protected $fillable = [
        'poli_id',
        'dokter_pengirim',
        'dokter_pengirim_luar',
        'rujukan_id',
        'tanggal_rawat',
        'bangsal_id',
        'doctor_id',
        'no_reg',
        'pasien_id',
        'nama_pasien',
        'penjab_id',
        'alamat',
        'telepon',
        'asal_rujukan',
        'hub_pasien',
        'nama_keluarga',
        'alamat_keluarga',
        'jenis_kartu',
        'no_kartu',
    ];

    public function pasien()
    {
        return $this->belongsTo(pasien::class,'no_rm','no_rm');
    }

    public function poli()
    {
        return $this->belongsTo(poli::class);
    }

    public function rujukan()
    {
        return $this->belongsTo(rujukan::class);
    }

    public function bangsal()
    {
        return $this->belongsTo(bangsal::class);
    }

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function docrim()
    {
        return $this->belongsTo(doctor::class,'dokter_pengirim','id');
    }
}
