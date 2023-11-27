<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $topProducts = DB::table('orders')
            ->join('produks', 'orders.produk_id', '=', 'produk_id')
            ->select('produk_id', 'produks.nama_produk', 'produks.harga', 'produks.gambar', DB::raw('COUNT(orders.produk_id)'))
            ->groupBy('produk_id', 'produks.nama_produk', 'produks.harga', 'produks.gambar')
            ->orderByDesc('produk_id')
            ->limit(3)
            ->get();

        $produk = Produk::all();
        return view('index', [
            'produk' => $produk,
            'produks' => $produk,
            'topProduk' => $topProducts
        ]);
    }
}
