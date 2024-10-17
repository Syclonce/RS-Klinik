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
        Schema::create('diagnosa_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rawat');
            $table->string('kode');
            $table->string('status');
            $table->string('prioritas');
            $table->string('status_penyakit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosa_pasiens');
    }
};
