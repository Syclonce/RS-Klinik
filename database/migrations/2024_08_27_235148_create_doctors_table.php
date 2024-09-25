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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->string('nik');
            $table->string('nama');
            $table->string('jabatan_id');
            $table->string('aktivasi');
            $table->string('poli_id');
            $table->string('tglawal');
            $table->string('Alamat');
            $table->string('seks');
            $table->string('sip');
            $table->string('str');
            $table->string('npwp');
            $table->string('tempat_lahir');
            $table->string('tgllahir');
            $table->string('statdok_id');
            $table->string('kode');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
