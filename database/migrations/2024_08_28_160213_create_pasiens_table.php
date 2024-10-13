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
            $table->string('no_bpjs')->nullable();
            $table->string('tgl_akhir')->nullable();
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
            $table->string('provinsi_kode');
            $table->string('kabupaten_kode');
            $table->string('kecamatan_kode');
            $table->string('desa_kode');
            $table->foreign('provinsi_kode')->references('kode')->on('provinsi')->onDelete('cascade');
            $table->foreign('kabupaten_kode')->references('kode')->on('kabupaten')->onDelete('cascade');
            $table->foreign('kecamatan_kode')->references('kode')->on('kecamatan')->onDelete('cascade');
            $table->foreign('desa_kode')->references('kode')->on('desa')->onDelete('cascade');
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
