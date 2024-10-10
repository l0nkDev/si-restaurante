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
        Schema::create('ordenas', function (Blueprint $table) {
            $table->id('NroOrdena');
            $table->Integer('Cantidad');
            $table->Decimal('SubTotal', 12);
            $table->foreignId('NumOrden')->references('NumOrden')->on('ordens');
            $table->foreignId('CodProd')->references('CodProd')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenas');
    }
};
