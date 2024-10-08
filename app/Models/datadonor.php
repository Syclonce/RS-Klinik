<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadonor extends Model
{
    use HasFactory;
    protected $table = 'datadonors';
    protected $fillable = [
        'no_donor',
        'nama',
        'tensi',
        'hbsag',
        'tgl_donor',
        'dinas',
        'hcv',
        'hiv',
        'no_bag',
        'jenis_bag',
        'jenis_donor',
        'sipilis',
        'malaria',
        'tempat',
        'petugas_raftap',
        'petugas_saring',
        'status',
    ];

    public function datapendor()
    {
        return $this->belongsTo(datapendor::class, 'nama', 'id');
    }

    public function doctor_raftap()
    {
        return $this->belongsTo(doctor::class, 'petugas_raftap', 'id');
    }

    public function doctor_saring()
    {
        return $this->belongsTo(doctor::class, 'petugas_saring', 'id');
    }
}
