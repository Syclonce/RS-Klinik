<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perjal extends Model
{
    use HasFactory;
    protected $table = 'perjals';
    protected $fillable = [
        'kode',
        'nama',
        'katper_id',
        'tarifdok',
        'tarifper',
        'total',
        'penjab_id',
        'poli_id',
        'status',
    ];

    public function katper()
    {
        return $this->belongsTo(katper::class);
    }

    public function poli()
    {
        return $this->belongsTo(poli::class);
    }

    public function penjab()
    {
        return $this->belongsTo(penjab::class);
    }

}
