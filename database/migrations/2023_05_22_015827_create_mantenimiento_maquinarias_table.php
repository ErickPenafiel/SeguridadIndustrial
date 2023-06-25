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
        Schema::create('mantenimiento_maquinarias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maquinaria_id');
            $table->foreign('maquinaria_id')->references('id')->on('maquinarias')->onDelete('cascade');
            $table->date('fecha');
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajadors')->onDelete('cascade');
            $table->enum('estado', ['No realizado', 'Realizado'])->default('No realizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_maquinarias');
    }
};
