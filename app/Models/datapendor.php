<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapendor extends Model
{
    use HasFactory;
    protected $table = 'datapendors';
    protected $fillable = [
        'no_pendonor',
        'nama',
        'no_ktp',
        'telepon',
        'tmp_lahir',
        'tgl_lahir',
        'seks_id',
        'goldar_id',
        'resus',
        'alamat',
        'provinsi_kode',
        'kabupaten_kode',
        'kecamatan_kode',
        'desa_kode',
    ];

    public function provinsi()
    {
        return $this->belongsTo(provinsi::class, 'provinsi_kode', 'kode');
    }

    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class, 'kabupaten_kode', 'kode');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_kode', 'kode');
    }

    public function desa()
    {
        return $this->belongsTo(desa::class, 'desa_kode', 'kode');
    }

    public function goldar()
    {
        return $this->belongsTo(goldar::class);
    }

    public function seks()
    {
        return $this->belongsTo(seks::class);
    }

    public function datadonor()
    {
        return $this->hasOne(datadonor::class, 'id', 'nama');
    }
}
