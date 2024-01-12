<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::create([
            'wisata_id' => Wisata::pluck('id')->random(),
            'user_id' => 2,
            'namaPemesan' => fake('id_ID')->name,
            'jumlahTiket' => rand(1, 10),
            'statusBayar' => rand(0, 1),
            'totalBayar' =>  Wisata::pluck('tarifMasuk')->random(),
        ]);
        $orde2 = Order::create([
            'wisata_id' => Wisata::pluck('id')->random(),
            'user_id' => 2,
            'namaPemesan' => fake('id_ID')->name,
            'jumlahTiket' => rand(1, 10),
            'statusBayar' => rand(0, 1),
            'totalBayar' =>  Wisata::pluck('tarifMasuk')->random(),

        ]);

        for ($i = 0; $i <= $order->jumlahTiket; $i++) {
            Tiket::create(
                [
                    'order_id' => $order->id,
                ]
            );
        }
        for ($i = 0; $i <= $orde2->jumlahTiket; $i++) {
            Tiket::create(
                [
                    'order_id' => $orde2->id,
                ]
            );
        }
    }
}
