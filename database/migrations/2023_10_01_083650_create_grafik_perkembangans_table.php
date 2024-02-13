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
        Schema::create('grafik_perkembangans', function (Blueprint $table) {
            $table->integer('ide_grafik_perkembangan',11, true)->autoIncrement();
            $table->enum('jenis',['imunisasi' ,'pemberian_vitamin' ,'tinggi_badan' ,'berat_badan' ,'lingkar_kepala']);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->integer('umur', false);
            $table->string('kbm', 50);
            $table->integer('normal', false);
            $table->integer('gizi_kurang', false);
            $table->integer('gizi_buruk', false);
            $table->integer('gizi_lebih', false);
            $table->integer('gizi_mikro', false);
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grafik_perkembangans');
    }
};
