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
        Schema::create('reunion_comites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comite_id');
            $table->foreign('comite_id')->references('id')->on('comite_mixtos')->delete('cascade');
            $table->date('fecha');
            $table->string('detalle');
            $table->enum('estado', ['Pendiente', 'Realizada'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunion_comites');
    }
};
