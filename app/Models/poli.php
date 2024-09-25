<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    use HasFactory;
    protected $table = 'polis';
    protected $fillable = [
        'nama_poli',
        'id_bpjs',
        'id_satusehat',
        'deskripsi',
        'status',
    ];

    public function doctor()
    {
        return $this->hasOne(doctor::class);
    }
}
