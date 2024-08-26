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
        Schema::create('role_redirects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id'); // Kunci asing untuk tabel roles
            $table->string('redirect_route');
            $table->timestamps();
            // Menambahkan constraint foreign key
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_redirects');
    }
};
