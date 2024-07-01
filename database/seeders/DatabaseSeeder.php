<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'id_divisi' => null,
            'id_angkatan' => null,
            'id_prodi' => null,
            'id_status' => null,
            'nama' => 'Admin',
            'nim' => null,
            'nia' => null,
            'email' => 'admin@wapala.com',
            'oprec' => 0,
            'password' => Hash::make('Wapa!a2004')
        ]);

        $this->call([
            DivisiSeeder::class,
            ProdiSeeder::class,
            StatusSeeder::class,
            AgamaSeeder::class,
            FakultasSeeder::class,
        ]);
    }
}
