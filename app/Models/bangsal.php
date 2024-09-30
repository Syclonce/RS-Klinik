<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bangsal extends Model
{
    use HasFactory;
    protected $table = 'bangsals';
    protected $fillable = [
        'kode_bangsal',
        'nama_bangsal',
        'status',
    ];

    public function kamar()
    {
        return $this->hasOne(kamar::class);
    }

    public function pernap()
    {
        return $this->hasOne(pernap::class);
    }
}
