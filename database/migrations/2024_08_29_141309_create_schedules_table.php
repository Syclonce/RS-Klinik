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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); 
            $table->string('hari', 10); // Kolom untuk hari, maksimal 10 karakter
            $table->time('awal'); // Kolom untuk waktu awal, format TIME
            $table->time('akhir'); // Kolom untuk waktu akhir, format TIME
            $table->unsignedInteger('menit'); // Kolom untuk menit, angka integer
            
            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
