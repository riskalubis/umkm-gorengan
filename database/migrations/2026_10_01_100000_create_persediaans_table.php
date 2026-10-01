<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('persediaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();
            $table->date('tanggal');
            $table->unsignedInteger('jumlah')->default(0);
            $table->timestamps();
            $table->unique(['produk_id', 'tanggal']);
        });
    }
    public function down(): void { Schema::dropIfExists('persediaans'); }
};
