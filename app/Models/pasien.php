<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = [
        'nomor_rm',
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

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
