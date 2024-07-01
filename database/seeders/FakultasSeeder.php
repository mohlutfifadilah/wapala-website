<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Fakultas::create([
            'nama_fakultas' => 'Fakultas Teknik Telekomunikasi dan Elektro',
        ]);
        \App\Models\Fakultas::create([
            'nama_fakultas' => 'Fakultas Informatika',
        ]);
        \App\Models\Fakultas::create([
            'nama_fakultas' => 'Fakultas Rekayasa Industri dan Desain',
        ]);
    }
}
