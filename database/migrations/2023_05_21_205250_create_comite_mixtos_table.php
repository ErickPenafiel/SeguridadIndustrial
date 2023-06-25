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
        Schema::create('comite_mixtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('miembro1');
            $table->foreign('miembro1')->references('id')->on('trabajadors');
            $table->unsignedBigInteger('miembro2');
            $table->foreign('miembro2')->references('id')->on('trabajadors');
            $table->unsignedBigInteger('miembro3');
            $table->foreign('miembro3')->references('id')->on('trabajadors');
            $table->unsignedBigInteger('miembro4');
            $table->foreign('miembro4')->references('id')->on('trabajadors');
            $table->date('fecha');
            $table->string('detalle');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comite_mixtos');
    }
};
