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
        Schema::create('rajals', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED by default
            $table->string('tgl_kunjungan'); // Gunakan tipe DATE untuk tanggal
            $table->string('time'); // Gunakan tipe TIME untuk waktu
            $table->string('doctor_id');
            $table->string('poli_id');
            $table->string('no_rm');
            $table->string('penjab_id');
            $table->string('no_reg');
            $table->string('no_rawat'); // VARCHAR(50) dengan constraint UNIQUE
            $table->string('nama_pasien');
            $table->string('tgl_lahir');
            $table->string('seks');
            $table->string('telepon');
            $table->string('status');
            $table->string('status_lanjut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rajals');
    }
};
