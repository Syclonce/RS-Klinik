<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ktbiaya extends Model
{
    use HasFactory;
    protected $table = 'ktbiayas';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function fmbiaya()
    {
        return $this->hasOne(fmbiaya::class);
    }
}
