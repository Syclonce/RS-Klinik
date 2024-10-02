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
        Schema::create('radiologis', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_lahir');
            $table->string('time');
            $table->string('nama');
            $table->string('doctor_id');
            $table->string('penjab_id');
            $table->string('no_reg');
            $table->string('no_rawat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiologis');
    }
};
