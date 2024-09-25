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
            $table->id();
            $table->string('no_rm');
            $table->string('nama');
            $table->string('sex');
            $table->string('ktp');
            $table->string('satusehat');
            $table->string('tanggal_lahir');
            $table->string('umur');
            $table->string('alamat');
            $table->string('tglpol');
            $table->string('poli');
            $table->string('dokter');
            $table->string('id_dokter');
            $table->string('pembayaran');
            $table->string('nomber');
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
