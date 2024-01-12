<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tiket;
use App\Models\Wisata;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {

        $wisata = Wisata::count();
        $pemesanLunas = Order::where('statusBayar', 1)->count();

        return view('admin.index', compact('pemesanLunas', 'wisata'));
    }

    public function pesanan()
    {

        $orders = Order::all();
        return view('admin.pemesanan.index', compact('orders'));
    }

    public function pesananShow(Order $order)
    {

        return view('admin.pemesanan.show', compact('order'));
    }

    public function konfirmasiPembayaran(Order $order)
    {

        for ($i = 1; $i <= $order->jumlahTiket; $i++) {
            Tiket::create(
                [
                    'order_id' => $order->id,
                ]
            );
        }
        $order->fill(['statusBayar' => 2]);
        $order->save();

        return back();
    }
}
