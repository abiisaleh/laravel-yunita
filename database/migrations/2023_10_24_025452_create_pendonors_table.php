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
        Schema::create('pendonors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->date('tanggal_lahir')->nullable();
            $table->foreignId('golongan_darah_id')->cascadeOnDelete();
            $table->foreignId('jenis_darah_id')->cascadeOnDelete();
            $table->enum('rh', ['positive', 'negative'])->default('positive');
            $table->foreignId('pekerjaan_id')->cascadeOnDelete();
            $table->text('alamat');
            $table->text('lat');
            $table->text('lng');
            $table->foreignId('user_id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendonors');
    }
};
