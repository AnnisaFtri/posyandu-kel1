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
        Schema::create('jenis_pelayanans', function (Blueprint $table) {
            $table->char('id_pelayanan', 5)->nullable(false)->primary();
            $table->string('jenis_pelayanan', 50);
            $table->date('tanggal_pelayanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pelayanans');
    }
};
