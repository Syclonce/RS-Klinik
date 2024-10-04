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
        Schema::create('ugds', function (Blueprint $table) {
            $table->id();
            $table->string('jeskec')->nullable();
            $table->string('nopol')->nullable();
            $table->string('tglkej')->nullable();
            $table->string('penjamin_kec')->nullable();
            $table->string('ketkec')->nullable();
            $table->string('no_reg');
            $table->string('no_rm');
            $table->string('no_rawat');
            $table->string('nama');
            $table->string('sex');
            $table->string('ktp');
            $table->string('kode_satusehat');
            $table->string('tanggal_lahir');
            $table->string('umur');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('active_kec');
            $table->string('tgl_pendaftaran');
            $table->string('doctor_id');
            $table->string('kode_dokter');
            $table->string('poli');
            $table->string('penjab_id');
            $table->string('no_kartu_pen');
            $table->string('hubungan_pasien');
            $table->string('nama_keluarga');
            $table->string('alamat_keluarga');
            $table->string('jenis_kartu');
            $table->string('no_kartu_kel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ugds');
    }
};
