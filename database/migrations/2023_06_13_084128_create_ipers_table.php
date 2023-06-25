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
        Schema::create('ipers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->text('sector');
            $table->text('actividad');
            $table->text('peligro');
            $table->text('riesgo');
            $table->text('daño');
            $table->text('medidas');
            $table->integer('equipos');
            $table->integer('procedimientos');
            $table->integer('capacitaciones');
            $table->integer('personasExpuestas');
            $table->integer('frecuencia');
            $table->integer('valorProbabilidad');
            $table->enum('indiceProbabilidad', ['Muy bajo', 'Baja', 'Media', 'Alta', 'Muy alta'])->default('Bajo');
            $table->integer('severidad');
            $table->integer('indiceRiesgo');
            $table->enum('valoracion', ['Trivial', 'Bajo', 'Moderado', 'Importante', 'Severo'])->default('Bajo');
            $table->text('medidasControl');
            $table->text('jerarquiaControl');
            $table->text('responsables');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipers');
    }
};
