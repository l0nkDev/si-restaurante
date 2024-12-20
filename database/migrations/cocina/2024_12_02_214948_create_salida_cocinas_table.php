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
        Schema::create('salida_cocinas', function (Blueprint $table) {
            $table->id('NroSalida');
            $table->dateTime('FechaHra');
            $table->foreignId('NumOrden')->references('NumOrden')->on('ordens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salida_cocinas');
    }
};
