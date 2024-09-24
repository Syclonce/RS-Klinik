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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->unique();
            $table->string('nik');
            $table->string('kode_ihs');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('no_bpjs');
            $table->string('tgl_akhir');
            $table->string('Alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->integer('kode_pos');
            $table->string('kewarganegaraan');
            $table->string('seks');
            $table->string('agama');
            $table->string('pendidikan');
            $table->foreignId('goldar_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->string('pernikahan');
            $table->string('pekerjaan');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
