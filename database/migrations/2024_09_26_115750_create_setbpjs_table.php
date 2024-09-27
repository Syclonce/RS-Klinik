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
        Schema::create('setbpjs', function (Blueprint $table) {
            $table->id();
            $table->string('BPJS_PCARE_CONSID');
            $table->string('BPJS_PCARE_SCREET_KEY');
            $table->string('BPJS_PCARE_USERNAME');
            $table->string('BPJS_PCARE_PASSWORD');
            $table->string('BPJS_PCARE_APP_CODE');
            $table->string('BPJS_PCARE_USER_KEY');
            $table->string('BPJS_PCARE_BASE_URL');
            $table->string('BPJS_PCARE_SERVICE_NAME');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setbpjs');
    }
};
