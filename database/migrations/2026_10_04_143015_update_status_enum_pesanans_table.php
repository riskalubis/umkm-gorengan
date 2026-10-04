<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ganti status lama "dibatalkan" menjadi "ditolak"
        DB::statement("
            UPDATE pesanans
            SET status = 'ditolak'
            WHERE status = 'dibatalkan'
        ");

        // Ubah daftar ENUM status
        DB::statement("
            ALTER TABLE pesanans
            MODIFY status ENUM(
                'menunggu',
                'diterima',
                'digoreng',
                'diantar',
                'selesai',
                'ditolak'
            ) NOT NULL DEFAULT 'menunggu'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan "ditolak" menjadi "dibatalkan"
        DB::statement("
            UPDATE pesanans
            SET status = 'dibatalkan'
            WHERE status = 'ditolak'
        ");

        // Kembalikan ENUM seperti semula
        DB::statement("
            ALTER TABLE pesanans
            MODIFY status ENUM(
                'menunggu',
                'diterima',
                'digoreng',
                'diantar',
                'selesai',
                'dibatalkan'
            ) NOT NULL DEFAULT 'menunggu'
        ");
    }
};