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
        Schema::create('datadonors', function (Blueprint $table) {
            $table->id();
            $table->string('no_donor');
            $table->foreignId('nama')->constrained('datapendors')->onDelete('cascade');
            $table->string('tensi');
            $table->string('hbsag');
            $table->string('tgl_donor');
            $table->string('dinas');
            $table->string('hcv');
            $table->string('hiv');
            $table->string('no_bag');
            $table->string('jenis_bag');
            $table->string('jenis_donor');
            $table->string('sipilis');
            $table->string('malaria');
            $table->string('tempat');
            $table->foreignId('petugas_raftap')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('petugas_saring')->constrained('doctors')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datadonors');
    }
};
