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
        Schema::create('kontrols', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosa');
            $table->string('tindakan');
            $table->string('alasan_kontrol');
            $table->string('rencana_tindak_lanjut');
            $table->string('tgl_datang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
};
