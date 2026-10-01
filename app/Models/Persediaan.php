<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $fillable = [
        'produk_id',
        'tanggal',
        'jumlah',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
