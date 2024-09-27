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
        Schema::create('dabars', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('expired');
            $table->string('status');
            $table->string('satbes_id');
            $table->string('sat_id');
            $table->string('harga_dasar');
            $table->string('harga_beli');
            $table->string('stok');
            $table->string('kapasitas');
            $table->string('isi');
            $table->string('letak');
            $table->string('jenbar_id');
            $table->string('industri_id');
            $table->string('katbar_id');
            $table->string('golbar_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dabars');
    }
};
