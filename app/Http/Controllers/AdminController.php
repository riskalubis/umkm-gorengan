<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Persediaan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function page(string $page)
    {
        $views = [
            'home'        => 'admin.home',
            'kategori'    => 'admin.kategori',
            'produk'      => 'admin.produk',
            'persediaan'  => 'admin.persediaan',
            'penjualan'   => 'admin.penjualan',
            'laporan'     => 'admin.laporan',
        ];

        abort_unless(isset($views[$page]), 404);

        $today = now()->toDateString();

        $data = match ($page) {

            // =========================
            // DASHBOARD
            // =========================
            'home' => [
                'pendapatan' => Pesanan::whereDate('created_at', $today)
                    ->where('status', '!=', 'dibatalkan')
                    ->sum('total'),

                'pesanan' => Pesanan::whereDate('created_at', $today)
                    ->latest()
                    ->take(6)
                    ->get(),

                // Mengambil jumlah produk langsung dari tabel PRODUKS
                'produkCount' => Produk::count(),

                // Stok/persediaan hanya yang benar-benar dimasukkan admin
                'stok' => Persediaan::whereDate('tanggal', $today)
                    ->sum('jumlah'),
            ],

            // =========================
            // KATEGORI
            // =========================
            'kategori' => [
                'kategoris' => Kategori::withCount('produks')
                    ->orderBy('id')
                    ->get(),

                // Produk berasal dari tabel yang sama
                'produks' => Produk::orderBy('nama')->get(),
            ],

            // =========================
            // PRODUK
            // =========================
            'produk' => [
                // Semua produk yang sudah ditambahkan admin
                'produks' => Produk::orderBy('nama')->get(),
            ],

            // =========================
            // PERSEDIAAN
            // =========================
            'persediaan' => [
                // Produk Terdaftar mengambil jumlah produk yang sama
                'produks' => Produk::orderBy('nama')->get(),

                'persediaans' => Persediaan::with('produk')
                    ->whereDate('tanggal', $today)
                    ->orderBy('id')
                    ->get(),
            ],

            // =========================
            // PENJUALAN
            // =========================
            'penjualan' => [
                'pesanans' => Pesanan::with('items')
                    ->whereDate('created_at', $today)
                    ->latest()
                    ->get(),
            ],

            // =========================
            // LAPORAN
            // =========================
            'laporan' => [
                'pesanans' => Pesanan::with('items')
                    ->whereDate('created_at', $today)
                    ->where('status', '!=', 'dibatalkan')
                    ->latest()
                    ->get(),
            ],
        };

        return response()->view($views[$page], $data);
    }


    // =====================================================
    // PRODUK
    // =====================================================

    public function storeProduk(Request $r)
    {
        $data = $r->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        // Upload foto jika ada
        if ($r->hasFile('foto')) {
            $data['foto'] = $r->file('foto')->store('produk', 's3');
        }

        // Jangan isi stok di tabel produk.
        // Stok akan diatur melalui menu Persediaan.
        Produk::create($data);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan.'
        ]);
    }


    public function updateProduk(Request $r, Produk $produk)
    {
        $data = $r->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        // Kalau admin mengganti foto
        if ($r->hasFile('foto')) {

            // Hapus foto lama kalau ada
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }

            // Simpan foto baru
            $data['foto'] = $r->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return response()->json([
            'message' => 'Produk berhasil diperbarui.'
        ]);
    }


    public function destroyProduk(Produk $produk)
    {
        // Tidak boleh menghapus produk yang sudah digunakan
        if (
            $produk->persediaans()->exists() ||
            $produk->pesananItems()->exists()
        ) {
            return response()->json([
                'message' => 'Produk sudah digunakan dalam data dan tidak dapat dihapus.'
            ], 422);
        }

        // Hapus file foto jika ada
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus.'
        ]);
    }


    // =====================================================
    // PERSEDIAAN
    // =====================================================

    public function storePersediaan(Request $r)
    {
        $data = $r->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $row = Persediaan::updateOrCreate(
            [
                'produk_id' => $data['produk_id'],
                'tanggal' => now()->toDateString(),
            ],
            [
                'jumlah' => $data['jumlah'],
            ]
        );

        return response()->json([
            'message' => 'Persediaan hari ini berhasil disimpan.',
            'id' => $row->id
        ]);
    }


    public function updatePersediaan(Request $r, Persediaan $persediaan)
    {
        $data = $r->validate([
            'jumlah' => 'required|integer|min:0'
        ]);

        $persediaan->update($data);

        return response()->json([
            'message' => 'Persediaan berhasil diperbarui.'
        ]);
    }


    // =====================================================
    // STATUS PESANAN
    // =====================================================

    public function updateStatus(Request $r, Pesanan $pesanan)
    {
        $data = $r->validate([
            'status' => 'required|in:menunggu,diterima,digoreng,diantar,selesai,dibatalkan'
        ]);

        DB::transaction(function () use ($pesanan, $data) {

            $oldStatus = $pesanan->status;
            $newStatus = $data['status'];

            // Pesanan yang dibatalkan mengembalikan jumlah persediaan.
            if ($newStatus === 'dibatalkan' && $oldStatus !== 'dibatalkan') {
                foreach ($pesanan->items as $item) {
                    $inv = Persediaan::where('produk_id', $item->produk_id)
                        ->whereDate('tanggal', now()->toDateString())
                        ->lockForUpdate()
                        ->first();

                    if ($inv) {
                        $inv->increment('jumlah', $item->jumlah);
                    }
                }
            }

            // Jika pesanan yang sebelumnya dibatalkan dibuka kembali,
            // jumlah persediaan dipotong lagi.
            if ($oldStatus === 'dibatalkan' && $newStatus !== 'dibatalkan') {
                foreach ($pesanan->items as $item) {
                    $inv = Persediaan::where('produk_id', $item->produk_id)
                        ->whereDate('tanggal', now()->toDateString())
                        ->lockForUpdate()
                        ->first();

                    if (!$inv || $inv->jumlah < $item->jumlah) {
                        abort(422, 'Persediaan '.$item->nama_produk.' tidak mencukupi untuk mengaktifkan kembali pesanan.');
                    }

                    $inv->decrement('jumlah', $item->jumlah);
                }
            }

            $pesanan->update([
                'status' => $newStatus
            ]);
        });

        return response()->json([
            'message' => 'Status pesanan diperbarui.'
        ]);
    }
}