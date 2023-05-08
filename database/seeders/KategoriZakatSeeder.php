<?php

namespace Database\Seeders;

use App\Models\KategoriZakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriZakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriZakat::create([
            'nama_zakat' => 'Perkebunan',
            'jenis_zakat' => 'langsung',
            'persentase' => 5
        ]);

        KategoriZakat::create([
            'nama_zakat' => 'Uang Digital',
            'jenis_zakat' => 'tidak langsung',
            'persentase' => 2.5
        ]);

        KategoriZakat::create([
            'nama_zakat' => 'Saham',
            'jenis_zakat' => 'tidak langsung',
            'persentase' => 2.5
        ]);

        KategoriZakat::create([
            'nama_zakat' => 'Investasi',
            'jenis_zakat' => 'langsung',
            'persentase' => 2.5
        ]);
    }
}
