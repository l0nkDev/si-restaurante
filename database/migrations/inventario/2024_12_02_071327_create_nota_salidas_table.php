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
        Schema::create('nota_salidas', function (Blueprint $table) {
            $table->id("NroSalida");
            $table->integer("Cantidad");
            $table->dateTime("FechaHra");
            $table->foreignId("CodItem")->references("CodItem")->on("items");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_salidas');
    }
};
