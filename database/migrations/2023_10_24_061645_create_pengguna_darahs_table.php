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
        Schema::create('pengguna_darahs', function (Blueprint $table) {
            $table->id();
            $table->string('pengguna');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->integer('jumlah_kolf');
            $table->date('tanggal');
            $table->foreignId('rumah_sakit_id')->cascadeOnDelete();
            $table->foreignId('darah_masuk_id')->cascadeOnDelete();
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
