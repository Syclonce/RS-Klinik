<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laboratorium extends Model
{
    use HasFactory;
    protected $table = 'laboratoria';
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
