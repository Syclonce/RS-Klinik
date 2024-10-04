<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ugd extends Model
{
    use HasFactory;
    protected $table = 'ugds';
    protected $fillable = [
        'jeskec',
        'nopol',
        'tglkej',
        'penjamin_kec',
        'ketkec',
        'no_reg',
        'no_rm',
        'no_rawat',
        'nama',
        'sex',
        'ktp',
        'kode_satusehat',
        'tanggal_lahir',
        'umur',
        'alamat',
        'telepon',
        'active_kec',
        'tgl_pendaftaran',
        'doctor_id',
        'kode_dokter',
        'poli',
        'penjab_id',
        'no_kartu_pen',
        'hubungan_pasien',
        'nama_keluarga',
        'alamat_keluarga',
        'jenis_kartu',
        'no_kartu_kel',
    ];

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
