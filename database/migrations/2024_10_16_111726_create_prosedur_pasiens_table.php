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
        Schema::create('prosedur_pasiens', function (Blueprint $table) {
            $table->id(); // ID auto-increment
            $table->string('no_rawat'); // Tipe data unsigned big integer untuk no_rawat
            $table->string('kode'); // Tipe data string untuk kode ICD-9
            $table->string('status'); // Status sebagai string
            $table->string('prioritas'); // Prioritas sebagai string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prosedur_pasiens');
    }
};
