<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'satuan'];

    public function zakat()
    {
        return $this->hasOne(KategoriZakat::class);
    }

    // public function zakats()
    // {
    //     return $this->belongsToMany(KategoriZakat::class, 'satuan_zakats', 'kategori_zakat_id', 'satuan_id')->as('zakats');
    // }
}
