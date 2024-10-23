<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subspesialis extends Model
{
    use HasFactory;
    protected $table = 'subspesialis';
    protected $fillable = [
        'kode_spesialis',
        'kode_poli',
        'kode',
        'nama',
    ];

    public function spesialis()
    {
        return $this->belongsTo(spesiali::class, 'kode_spesialis', 'kode');
    }
}
