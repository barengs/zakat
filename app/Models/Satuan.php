<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'satuan'];

    public function zakats()
    {
        return $this->belongsToMany(KategoriZakat::class, 'satuan_zakats')->as('zakats');
    }
}
