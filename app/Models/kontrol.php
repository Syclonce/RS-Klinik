<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrol extends Model
{
    use HasFactory;
    protected $table = 'kontrols';
    protected $fillable = [
        'diagnosa',
        'tindakan',
        'alasan_kontrol',
        'rencana_tindak_lanjut',
        'tgl_datang',
    ];
}
