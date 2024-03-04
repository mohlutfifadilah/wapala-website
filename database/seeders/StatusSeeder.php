<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Status::create([
            'nama_status' => 'AK',
            'kepanjangan' => 'Anggota Kehormatan'
        ]);
        \App\Models\Status::create([
            'nama_status' => 'ALB',
            'kepanjangan' => 'Anggota Luar Biasa'
        ]);
        \App\Models\Status::create([
            'nama_status' => 'AB',
            'kepanjangan' => 'Anggota Biasa'
        ]);
    }
}
