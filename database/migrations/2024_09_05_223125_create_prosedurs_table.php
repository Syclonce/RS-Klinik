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
        Schema::create('prosedurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipepemeriksas_id')->constrained()->onDelete('cascade');
            $table->string('kode');
            $table->string('pembayaran');
            $table->string('deskripsi');
            $table->string('harga');
            $table->integer('komisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prosedurs');
    }
};
