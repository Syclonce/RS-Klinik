<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perlogi extends Model
{
    use HasFactory;
    protected $table = 'perlogis';
    protected $fillable = [
        'kode',
        'nama',
        'tarifdok',
        'tarifper',
        'total',
        'penjab_id',
        'kelas',
        'status',
    ];

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }
}
