<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjab extends Model
{
    use HasFactory;
    protected $table = 'penjabs';
    protected $fillable = [
        'kode',
        'pj',
        'nama',
        'alamat',
        'telp',
        'attn',
        'status',
    ];

    public function perjal()
    {
        return $this->hasOne(perjal::class);
    }

    public function pernap()
    {
        return $this->hasOne(pernap::class);
    }

    public function perlogi()
    {
        return $this->hasOne(perlogi::class);
    }

    public function radiologi()
    {
        return $this->hasOne(radiologi::class);
    }

    public function ranap()
    {
        return $this->hasOne(ranap::class);
    }

    public function labdata()
    {
        return $this->hasOne(labdata::class);
    }

    public function ugd()
    {
        return $this->hasOne(ugd::class);
    }
}
