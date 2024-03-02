<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Divisi::create([
            'logo' => null,
            'nama_divisi' => 'Rock Climbing',
        ]);

        \App\Models\Divisi::create([
            'logo' => null,
            'nama_divisi' => 'Gunung Hutan',
        ]);

        \App\Models\Divisi::create([
            'logo' => null,
            'nama_divisi' => 'Caving',
        ]);
    }
}
