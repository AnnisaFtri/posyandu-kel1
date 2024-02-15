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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->char('id_pemeriksaan', 5)->nullable(false)->primary();
            $table->string('nama_anak',50);
            $table->char('id_anak', 20)->nullable(false);
            $table->date('tanggal_pemeriksaan')->nullable(false);
            $table->string('usia')->nullable(false);
            $table->string('berat_badan', false)->nullable(false);
            $table->string('tinggi_badan', false)->nullable(false);
            $table->integer('lingkar_kepala', false)->nullable(false);
            $table->string('status_gizi',50)->nullable(false);
            $table->string('saran',50)->nullable(false);
              
            $table->foreign('id_anak')->on('anaks')->references('id_anak')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }

};