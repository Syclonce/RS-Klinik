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
        Schema::create('datapendors', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendonor');
            $table->string('nama');
            $table->string('no_ktp');
            $table->string('telepon');
            $table->string('tmp_lahir');
            $table->string('tgl_lahir');
            $table->foreignId('seks_id')->constrained()->onDelete('cascade');
            $table->foreignId('goldar_id')->constrained()->onDelete('cascade');
            $table->string('resus');
            $table->string('alamat');

            // Tambahkan kolom untuk foreign key
            $table->string('provinsi_kode');  // Menambahkan kolom provinsi_kode
            $table->string('kabupaten_kode'); // Menambahkan kolom kabupaten_kode
            $table->string('kecamatan_kode'); // Menambahkan kolom kecamatan_kode
            $table->string('desa_kode');      // Menambahkan kolom desa_kode

            // Tambahkan constraint foreign key setelah kolom didefinisikan
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
        Schema::dropIfExists('datapendors');
    }
};
