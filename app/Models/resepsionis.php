<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resepsionis extends Model
{
    use HasFactory;
    protected $table = 'resepsionis';
    protected $fillable = [
        'nama',
        'Alamat',
        'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
