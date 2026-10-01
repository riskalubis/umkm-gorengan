<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model {
    protected $fillable = ['nama','harga','foto','deskripsi'];
    protected $casts = ['harga'=>'decimal:2'];
    public function pesananItems(){ return $this->hasMany(PesananItem::class); }
    public function persediaans(){ return $this->hasMany(Persediaan::class); }
    public function persediaanHariIni(){ return $this->hasOne(Persediaan::class)->whereDate('tanggal', now()->toDateString()); }
}
