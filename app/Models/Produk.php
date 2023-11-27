<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = [
        'nama_produk',
        'harga',
        'gambar',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function getImage()
    {
        $isUrl = str_contains($this->gambar, 'http');

        return ($isUrl) ? $this->gambar : Storage::disk('public')->url($this->gambar);
    }
}
