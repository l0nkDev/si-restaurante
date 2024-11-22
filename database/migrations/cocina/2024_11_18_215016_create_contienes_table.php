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
        Schema::create('contienes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('CodProd')->references('CodProd')->on('productos');
            $table->foreignId('CodIngr')->references('CodIngr')->on('ingredientes');
            $table->integer('Cantidad');
            $table->text('Unidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
