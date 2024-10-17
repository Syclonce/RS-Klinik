<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rajal_layanan extends Model
{
    use HasFactory;
    protected $table = 'rajal_layanans';
    protected $fillable = [
        'no_rawat',
        'no_rm',
        'nama_pasien',
        'tgl_kunjungan',
        'time',
        'jenis_tindakan',
        'total_biaya',
        'provider',
        'id_dokter',
        'b_dokter',
        'id_perawat',
        'b_perawat',
    ];

    public function rajal()
    {
        return $this->belongsTo(Rajal::class, 'no_rawat', 'no_rawat');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_dokter', 'id');
    }

    public function perawat()
    {
        return $this->belongsTo(Suberdaya::class, 'id_perawat', 'id');
    }
}
