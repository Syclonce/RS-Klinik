<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'nama',
        'Alamat',
        'spesialis',
        'harga',
        'telepon',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function doctorvisit()
    {
        return $this->hasOne(doctor_visit::class);
    }
}
