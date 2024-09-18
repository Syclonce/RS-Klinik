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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->string('no_rm')->unique()->change();
            $table->string('nama');
            $table->string('Alamat');
            $table->string('tgl');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->string('telepon');
            $table->string('seks');
            $table->foreignId('goldar_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
