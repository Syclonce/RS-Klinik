<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dabar extends Model
{
    use HasFactory;
    protected $table = 'dabars';
    protected $fillable = [
        'kode',
        'nama',
        'expired',
        'status',
        'satbes_id',
        'sat_id',
        'harga_dasar',
        'harga_beli',
        'stok',
        'kapasitas',
        'isi',
        'letak',
        'janbar_id',
        'industri_id',
        'katbar_id',
        'golbar_id',
    ];

    public function satbes()
    {
        return $this->belongsTo(satuan::class,'satbes_id','id');
    }

    public function sat()
    {
        return $this->belongsTo(satuan::class,'sat_id','id');
    }

    public function jenbar()
    {
        return $this->belongsTo(jenbar::class);
    }

    public function industri()
    {
        return $this->belongsTo(industri::class);
    }

    public function katbar()
    {
        return $this->belongsTo(katbar::class);
    }

    public function golbar()
    {
        return $this->belongsTo(golbar::class);
    }

}
