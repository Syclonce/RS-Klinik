<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perawatan extends Model
{
    use HasFactory;
    protected $table = 'perawatans';
    protected $fillable = [
        'kode_perawatan',
        'nama_perawatan',
    ];

    public function details()
    {
        return $this->hasMany(DetailPerawatan::class, 'perawatan_id');
    }
}
