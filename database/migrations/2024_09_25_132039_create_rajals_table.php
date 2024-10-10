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
            $table->id(); // BIGINT UNSIGNED by default
            $table->string('tgl_kunjungan'); // Use DATE type for dates
            $table->string('time'); // Use TIME type for times
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); // FK to doctors
            $table->foreignId('poli_id')->constrained()->onDelete('cascade'); // FK to polis
            $table->string('penjab_id');
            $table->string('no_reg');
            $table->string('no_rawat');
            $table->string('no_rm'); // This should match the type in pasiens
            $table->string('nama_pasien');
            $table->string('tgl_lahir'); // Use DATE type for dates
            $table->string('seks');
            $table->string('telepon');
            $table->timestamps();

            // Adding the foreign key constraint for no_rm explicitly
            $table->foreign('no_rm')->references('no_rm')->on('pasiens')->onDelete('cascade');
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
