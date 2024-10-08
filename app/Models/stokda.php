<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokda extends Model
{
    use HasFactory;
    protected $table = 'stokdas';
    protected $fillable = [
        'no_kantong',
        'kode',
        'goldar_id',
        'resus',
        'tgl_aftap',
        'tgl_kadaluarsa',
        'asal_darah',
        'status',
    ];

    public function goldar()
    {
        return $this->belongsTo(goldar::class);
    }

    public function komda()
    {
        return $this->belongsTo(komda::class, 'kode', 'id');
    }
}
