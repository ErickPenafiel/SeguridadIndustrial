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
        Schema::create('detalle_dotacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dotacion');
            $table->foreign('id_dotacion')->references('id')->on('dotacion_e_p_p_s');
            $table->unsignedBigInteger('id_insumo');
            $table->foreign('id_insumo')->references('id')->on('insumos');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_dotacions');
    }
};
