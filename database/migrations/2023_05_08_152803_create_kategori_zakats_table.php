<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_zakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_zakat');
            $table->enum('jenis_zakat', ['langsung', 'tidak langsung']);
            $table->float('persentase');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_zakats');
    }
};
