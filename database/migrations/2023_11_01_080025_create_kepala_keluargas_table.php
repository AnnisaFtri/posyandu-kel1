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
        Schema::create('kepala_keluargas', function (Blueprint $table) {
            $table->integer('no_kk', false)->nullable(false)->primary();
            $table->string('username', 50)->nullable(false);
            $table->string('nama_ayah',50);
            $table->string('alamat_ayah', 50);

            $table->foreign('username')->on('table_users')->references('username')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_keluargas');
    }
};