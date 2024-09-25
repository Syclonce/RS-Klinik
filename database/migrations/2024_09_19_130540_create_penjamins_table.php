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
        Schema::create('penjamins', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nomor');
            $table->string('nama');
            $table->string('verifikasi');
            $table->string('filter');
            $table->string('awal');
            $table->string('akhir');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('fakes');
            $table->string('contact');
            $table->string('telp');
            $table->string('hp');
            $table->string('jabatan');
            $table->string('akun');
            $table->string('cabang');
            $table->string('rek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjamins');
    }
};
