<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laptemplate extends Model
{
    use HasFactory;
    protected $table = 'laptemplates';
    protected $fillable = [
        'nama',
        'template',
    ];

    public function laptes()
    {
        return $this->hasOne(laptes::class);
    }
}
