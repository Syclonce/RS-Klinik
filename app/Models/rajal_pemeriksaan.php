<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rajal_pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'rajal_pemeriksaans';
    protected $fillable = [
        'no_rawat',
        'tgl_kunjungan',
        'time',
        'nama_pasien',
        'umur_pasien',
        'tensi',
        'suhu',
        'nadi',
        'rr',
        'tinggi_badan',
        'berat_badan',
        'kesadaran',
        'spo2',
        'gcs',
        'alergi',
        'lingkar_perut',
        'subyektif',
        'obyektif',
        'assessmen',
        'plan',
        'instruksi',
        'evaluasi',
    ];

    public function rajal()
    {
        return $this->belongsTo(rajal::class, 'no_rawat', 'no_rawat');
    }
}
