<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriZakat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_zakat',
        'jenis_zakat',
        'persentase',
        'keterangan',
        'minimal',
        'satuan_id',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    // public function satuans()
    // {
    //     return $this->belongsToMany(Satuan::class, 'satuan_zakats', 'satuan_id', 'kategori_zakat_id')->as('satuans');
    // }
}
