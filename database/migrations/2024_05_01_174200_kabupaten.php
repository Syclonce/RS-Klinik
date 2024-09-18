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
        //
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_provinsi');
            $table->string('name');
            $table->timestamps();
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupaten');
    }
};
