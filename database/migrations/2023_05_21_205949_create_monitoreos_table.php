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
        Schema::create('monitoreos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('observaciones');
            $table->string('detalle');
            $table->string('responsable');
            $table->string('tipoMonitoreo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoreos');
    }
};
