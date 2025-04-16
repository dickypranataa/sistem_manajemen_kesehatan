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
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade');
            $table->timestamp('tgl_periksa')->nullable();
            $table->string('catatan')->nullable();
            $table->integer('biaya_periksa')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksas');
    }
};
