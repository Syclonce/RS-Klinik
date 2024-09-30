<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pernap extends Model
{
    use HasFactory;
    protected $table = 'pernaps';
    protected $fillable = [
        'kode',
        'nama',
        'katper_id',
        'tarifdok',
        'tarifper',
        'total',
        'penjab_id',
        'bangsal_id',
        'kelas',
        'status',
    ];

    public function katper()
    {
        return $this->belongsTo(katper::class);
    }

    public function bangsal()
    {
        return $this->belongsTo(bangsal::class);
    }

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }
}
