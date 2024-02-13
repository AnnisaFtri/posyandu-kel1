<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anaks', function (Blueprint $table) {
            $table->char('id_anak', 5)->nullable(false)->primary();
            $table->integer('no_kk',false)->nullable(false);
            $table->string('nama_anak',50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['laki-laki', 'perempuan']);
            $table->string('nama_orangtua', 50);
            $table->integer('anak_ke', false);
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('no_kk')->on('kepala_keluargas')->references('no_kk')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};