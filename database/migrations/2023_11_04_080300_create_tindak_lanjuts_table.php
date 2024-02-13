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
        Schema::create('tindak_lanjuts', function (Blueprint $table) {
            $table->string('id_tindak_lanjut', 5)->nullable(false)->primary;
            $table->string('id_pelayanan', 5)->nullable(false);
            $table->string('id_pemeriksaan', 5)->nullable(false);
            $table->string('nomor_petugas', 5)->nullable(false);
          

            $table->foreign('id_pelayanan')->on('jenis_pelayanans')->references('id_pelayanan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_pemeriksaan')->on('pemeriksaans')->references('id_pemeriksaan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nomor_petugas')->on('kaders')->references('nomor_petugas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindak_lanjuts');
    }
};