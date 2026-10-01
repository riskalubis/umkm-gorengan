<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananItem;
use App\Models\Persediaan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PelangganController extends Controller
{
    public function home()
    {
        $persediaans = Persediaan::with('produk')
            ->whereDate('tanggal', now()->toDateString())
            ->where('jumlah', '>', 0)
            ->get();

        return view('pelanggan.home', compact('persediaans'));
    }

    public function checkout(Request $r)
    {
        $data = $r->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'whatsapp' => 'required|string|max:30',
            'alamat' => 'required|string',
            'catatan' => 'nullable|string',

            'items' => 'required|array|min:1',
            'items.*.produk_id' => 'required|exists:produks,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($data) {

            $total = 0;
            $rows = [];

            foreach ($data['items'] as $item) {

                $inv = Persediaan::where('produk_id', $item['produk_id'])
                    ->whereDate('tanggal', now()->toDateString())
                    ->lockForUpdate()
                    ->first();

                $produk = Produk::findOrFail($item['produk_id']);

                // Stok hari ini diambil dari kolom "jumlah"
                if (!$inv || $inv->jumlah < $item['jumlah']) {
                    abort(
                        422,
                        'Stok ' . $produk->nama . ' tidak mencukupi.'
                    );
                }

                $subtotal = $produk->harga * $item['jumlah'];

                $total += $subtotal;

                $rows[] = [
                    $produk,
                    $item['jumlah'],
                    $subtotal,
                    $inv
                ];
            }

            // Minimal pembelian Rp10.000
            if ($total < 10000) {
                abort(
                    422,
                    'Minimal pembelian adalah Rp10.000.'
                );
            }

            $kode = 'ORD-' . strtoupper(Str::random(8));

            $pesanan = Pesanan::create([
                'kode' => $kode,
                'nama_pelanggan' => $data['nama_pelanggan'],
                'whatsapp' => $data['whatsapp'],
                'alamat' => $data['alamat'],
                'catatan' => $data['catatan'] ?? null,
                'total' => $total,
                'status' => 'menunggu',
            ]);

            foreach ($rows as [$produk, $jumlah, $subtotal, $inv]) {

                PesananItem::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $produk->id,
                    'nama_produk' => $produk->nama,
                    'harga' => $produk->harga,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ]);

                // Kurangi persediaan hari ini
                $inv->decrement('jumlah', $jumlah);
            }

            return response()->json([
                'message' => 'Pesanan berhasil dibuat.',
                'kode' => $kode
            ]);
        });
    }

    public function status(string $kode)
    {
        $pesanan = Pesanan::with('items')
            ->where('kode', $kode)
            ->firstOrFail();

        return response()->json($pesanan);
    }
}
