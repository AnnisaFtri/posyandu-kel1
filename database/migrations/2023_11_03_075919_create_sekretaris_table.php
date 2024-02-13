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
        Schema::create('sekretaris', function (Blueprint $table) {
            $table->integer('NIK', false)->nullable(false)->primary();
            $table->string('username', 50)->nullable(false);
            $table->string('nama_sekretaris', 50)->nullable(false);
            $table->date('tanggal_lahir_sekretaris');
            $table->enum('jenis_kelamin',['laki-laki', 'perempuan']);
            $table->string('alamat', 50);
            $table->integer('no_telpon_sekretaris', false);
            $table->timestamps();

            $table->foreign('username')->on('table_users')->references('username')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekretaris');
    }
};