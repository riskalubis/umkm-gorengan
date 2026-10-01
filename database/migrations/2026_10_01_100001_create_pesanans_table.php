<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30)->unique();
            $table->string('nama_pelanggan');
            $table->string('whatsapp', 30);
            $table->text('alamat');
            $table->text('catatan')->nullable();
            $table->decimal('total', 12, 2);
            $table->enum('status', ['menunggu','diterima','digoreng','diantar','selesai','dibatalkan'])->default('menunggu');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pesanans'); }
};
