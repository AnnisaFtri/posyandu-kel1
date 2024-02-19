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
        Schema::create('table_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username', 50)->nullable(false);
            $table->text('password')->nullable (false);
            $table->text('foto')->nullable (false);
            $table->enum('role', ['admin', 'operator', 'warga']);

            // $table->string('username', 50)->nullable(false)->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_user');
    }
};
