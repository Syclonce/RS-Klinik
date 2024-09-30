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
        Schema::create('penjabs', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('pj');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->string('attn');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjabs');
    }
};
