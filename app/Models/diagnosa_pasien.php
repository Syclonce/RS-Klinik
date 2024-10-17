<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnosa_pasien extends Model
{
    use HasFactory;
    protected $table = 'diagnosa_pasiens';
    protected $fillable = [
        'no_rawat',
        'kode',
        'status',
        'prioritas',
        'status_penyakit',
    ];

    public function icd10()
    {
        return $this->belongsTo(icd10::class, 'kode', 'kode');
    }
}
