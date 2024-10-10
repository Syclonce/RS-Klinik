<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = [
        'no_rm',
        'nik',
        'kode_ihs',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'no_bpjs',
        'tgl_akhir',
        'Alamat',
        'rt',
        'rw',
        'kode_pos',
        'kewarganegaraan',
        'provinsi_kode',
        'kabupaten_kode',
        'kecamatan_kode',
        'desa_kode',
        'seks',
        'agama',
        'pendidikan',
        'goldar_id',
        'pernikahan',
        'pekerjaan',
        'telepon',
    ];

    public function goldar()
    {
        return $this->belongsTo(goldar::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(provinsi::class, 'kode_provinsi', 'kode_provinsi');
    }

    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class, 'kode_kabupaten', 'kode_kabupaten');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(desa::class, 'kode_desa', 'kode_desa');
    }

    public function radiologi()
    {
        return $this->hasOne(radiologi::class,'no_rm','no_rm');
    }

    public function ranap()
    {
        return $this->hasOne(ranap::class,'no_rm','no_rm');
    }

    public function labdata()
    {
        return $this->hasOne(labdata::class);
    }

    public function seks()
    {
        return $this->belongsTo(seks::class, 'seks', 'id');
    }

    public function rajal()
    {
        return $this->hasOne(rajal::class,'no_rm','no_rm');
    }
}
