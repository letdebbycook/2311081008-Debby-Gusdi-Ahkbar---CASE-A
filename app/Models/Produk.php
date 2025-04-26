<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes, HasFactory;
    
        protected $fillable = [
            'nama_produk',
            'kategori',
            'harga',
            'stok',
            'deskripsi',
            'tanggal_masuk'
        ];
}
