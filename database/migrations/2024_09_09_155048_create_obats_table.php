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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('obatk_id')->constrained()->onDelete('cascade');
            $table->integer('pembelian');
            $table->integer('penjualan');
            $table->integer('kuantitas');
            $table->string('generik');
            $table->string('perusahaan');
            $table->string('efek');
            $table->string('kota');
            $table->string('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
