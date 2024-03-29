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
        Schema::create('kaders', function (Blueprint $table) {
            $table->char('nomor_petugas', 5)->nullable(false)->primary();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_kader', 50)->nullable(false);
            $table->date('tanggal_lahir_kader');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('alamat', 150);
            $table->string('no_telpon_kader');
            $table->string('nama_posyandu', 50);
            $table->timestamps(false);

            $table->foreign('id_user')->references('id_user')->on('table_user')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaders');
    }
};
