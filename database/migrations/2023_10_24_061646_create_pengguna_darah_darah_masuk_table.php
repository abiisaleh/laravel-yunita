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
        Schema::create('darah_masuk_pengguna_darah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('darah_masuk_id')->cascadeOnDelete();
            $table->foreignId('pengguna_darah_id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_darahs');
    }
};
