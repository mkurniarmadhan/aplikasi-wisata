<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wisata::create([
            'namaWisata' => fake('id_ID')->company(),
            'lokasiWisata' => fake('id_ID')->city(),
            'deskripsiWisata' => fake('id_ID')->paragraph(),
            'tarifMasuk' => fake()->randomFloat(2, 1, 100),
        ]);
    }
}
