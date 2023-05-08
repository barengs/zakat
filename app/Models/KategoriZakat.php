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
    ];
}
