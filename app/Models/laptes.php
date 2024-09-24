<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laptes extends Model
{
    use HasFactory;
    protected $table = 'laptes';
    protected $fillable = [
        'tanggal',
        'pasien_id',
        'doctor_id',
        'laptemplate_id',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function laptemplate()
    {
        return $this->belongsTo(laptemplate::class);
    }
}
