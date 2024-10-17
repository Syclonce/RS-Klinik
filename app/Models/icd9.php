<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class icd9 extends Model
{
    use HasFactory;
    protected $table = 'icd9s';
    protected $fillable = [
        'kode',
        'nama',
    ];

    public function prosedurPasien()
    {
        return $this->hasMany(prosedur_pasien::class, 'kode', 'kode');
    }
}
