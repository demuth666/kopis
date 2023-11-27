<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'produk_id',
        //'harga',
        'jumlah',
        'total',
        'nama',
        'alamat',
        'no_hp',
        'email',
        'bukti_pembayaran',
        'status',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
