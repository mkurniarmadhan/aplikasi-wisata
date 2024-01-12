<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'namaLengkap' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => fake('id_ID')->phoneNumber(),
            'alamat' => fake('id_ID')->address(),
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
        \App\Models\User::create([
            'namaLengkap' => fake('id_ID')->name(),
            'email' => fake('id_ID')->email(),
            'phone' => fake('id_ID')->phoneNumber(),
            'alamat' => fake('id_ID')->address(),
            'password' => bcrypt('password'),
        ]);

        $this->call([
            WisataSeeder::class,
            OrderSeeder::class
        ]);
    }
}
