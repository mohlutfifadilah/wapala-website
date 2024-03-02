<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Prodi::create([
            'nama_prodi' => 'D3 Teknik Telekomunikasi',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Teknik Informatika',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Teknik Telekomunikasi',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Desain Komunikasi Visual',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Rekayasa Perangkat Lunak',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Sistem Informasi',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Sains Data',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Teknik Elektro',
        ]);
        \App\Models\Prodi::create([
            'nama_prodi' => 'S1 Bisnis Digital',
        ]);
    }
}
