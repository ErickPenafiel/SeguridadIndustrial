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
        Schema::create('foto_monitoreos', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->unsignedBigInteger('monitoreo_id');
            $table->foreign('monitoreo_id')->references('id')->on('monitoreos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_monitoreos');
    }
};
