<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'nik',
        'nama',
        'jabatan_id',
        'aktivasi',
        'poli_id',
        'tglawal',
        'Alamat',
        'seks',
        'sip',
        'str',
        'npwp',
        'tempat_lahir',
        'tgllahir',
        'statdok_id',
        'kode',
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

    public function pasien()
    {
        return $this->hasOne(pasien::class);
    }
    public function schedule()
    {
        return $this->hasOne(schedule::class);
    }
    public function liburan()
    {
        return $this->hasOne(liburan::class);
    }
    public function laptes()
    {
        return $this->hasOne(laptes::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }

    public function poli()
    {
        return $this->belongsTo(poli::class);
    }

    public function statdok()
    {
        return $this->belongsTo(statdok::class);
    }

    public function radiologi()
    {
        return $this->hasOne(radiologi::class);
    }

    public function ranap()
    {
        return $this->hasOne(ranap::class);
    }

    public function ranapngirim()
    {
        return $this->hasOne(ranap::class,'id','dokter_pengirim');
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
