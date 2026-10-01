<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model {
    protected $fillable = ['kode','nama_pelanggan','whatsapp','alamat','catatan','total','status'];
    public function items(){ return $this->hasMany(PesananItem::class); }
}
