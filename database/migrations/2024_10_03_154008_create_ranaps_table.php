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
        Schema::create('ranaps', function (Blueprint $table) {
            $table->id();
            $table->string('poli_id')->nullable()->change();
            $table->string('dokter_pengirim')->nullable()->change();
            $table->string('dokter_pengirim_luar')->nullable()->change();
            $table->string('rujukan_id')->nullable()->change();
            $table->string('tanggal_rawat')->nullable()->change();
            $table->string('bangsal_id')->nullable()->change();
            $table->string('doctor_id')->nullable()->change();
            $table->string('no_reg');
            $table->string('pasien_id');
            $table->string('nama_pasien');
            $table->string('penjab_id');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('asal_rujukan');
            $table->string('hub_pasien');
            $table->string('nama_keluarga');
            $table->string('alamat_keluarga');
            $table->string('jenis_kartu');
            $table->string('no_kartu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranaps');
    }
};
