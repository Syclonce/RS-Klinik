<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prosedur_pasien extends Model
{
    use HasFactory;
    protected $table = 'prosedur_pasiens';
    protected $fillable = [
        'no_rawat',
        'kode',
        'status',
        'prioritas',
    ];

    public function icd9()
    {
        return $this->belongsTo(icd9::class, 'kode', 'kode');
    }
}
