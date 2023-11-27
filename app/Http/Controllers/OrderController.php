<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\produk;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index($id)
    {
        $produk = produk::findOrFail($id);
        return view('orders.index', [
            'produk' => $produk
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'jumlah' => 'required',
            'produk_id' => 'required',
            'harga' => 'required',
            'bukti_pembayaran' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048',
            // 'status' => 'required',
        ]);

        $image = $request->file('bukti_pembayaran');
        $nama_foto = 'bukti_pembayaran/' . $image->getClientOriginalName();
        $image->storeAs('public', $nama_foto);

        $order = new Order;
        $order->nama = $request->nama;
        $order->alamat = $request->alamat;
        $order->no_hp = $request->no_hp;
        $order->email = $request->email;
        $order->produk_id = $request->produk_id;
        $order->jumlah = $request->jumlah;
        $order->total = $request->jumlah * $request->harga;
        $order->bukti_pembayaran = $nama_foto;
        $order->save();

        return redirect('/');
    }
}
