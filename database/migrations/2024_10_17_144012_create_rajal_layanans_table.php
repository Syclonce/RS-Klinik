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
        Schema::create('rajal_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_rawat');
            $table->string('no_rm');
            $table->string('nama_pasien');
            $table->string('tgl_kunjungan');
            $table->string('time');
            $table->string('jenis_tindakan');
            $table->string('total_biaya');
            $table->string('provider');
            $table->string('id_dokter')->nullable();
            $table->string('b_dokter')->nullable();
            $table->string('id_perawat')->nullable();
            $table->string('b_perawat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rajal_layanans');
    }
};
