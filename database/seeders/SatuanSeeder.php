<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Satuan::create([
            'nama' => 'kilo gram',
            'satuan' => 'kg',
        ]);
        Satuan::create([
            'nama' => 'gram',
            'satuan' => 'gr',
        ]);
        Satuan::create([
            'nama' => 'Rupiah',
            'satuan' => 'Rp',
        ]);
    }
}
