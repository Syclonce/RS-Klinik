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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tgl');
            $table->string('jam');
            $table->string('nama_pembeli');
            $table->string('alamat_pembeli');
            $table->string('telepon');
            $table->string('email');
            $table->string('keterangan');
            $table->string('harga');
 	        $table->string('potongan');
            $table->string('harga_total');
            $table->string('bayar');
            $table->string('kembalian');
            $table->string('cara_bayar');
            $table->string('stok');
            $table->string('datjal_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
