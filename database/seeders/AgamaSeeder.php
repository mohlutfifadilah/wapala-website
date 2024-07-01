<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\Models\Agama::create([
            'nama_agama' => 'Islam',
        ]);
        \App\Models\Agama::create([
            'nama_agama' => 'Kristen',
        ]);
        \App\Models\Agama::create([
            'nama_agama' => 'Katolik',
        ]);
        \App\Models\Agama::create([
            'nama_agama' => 'Hindu',
        ]);
        \App\Models\Agama::create([
            'nama_agama' => 'Buddha',
        ]);
        \App\Models\Agama::create([
            'nama_agama' => 'Konghucu',
        ]);
    }
}
