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
        Schema::create('stokdas', function (Blueprint $table) {
            $table->id();
            $table->string('no_kantong');
            $table->foreignId('kode')->constrained('komdas')->onDelete('cascade');
            $table->foreignId('goldar_id')->constrained()->onDelete('cascade');
            $table->string('resus');
            $table->string('tgl_aftap');
            $table->string('tgl_kadaluarsa');
            $table->string('asal_darah');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stokdas');
    }
};
