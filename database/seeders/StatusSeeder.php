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
        ]);
        \App\Models\Status::create([
            'nama_status' => 'ALB',
        ]);
        \App\Models\Status::create([
            'nama_status' => 'AB',
        ]);
    }
}
