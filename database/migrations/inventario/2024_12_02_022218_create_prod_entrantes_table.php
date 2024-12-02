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
        Schema::dropIfExists('prod_entrantes');
        Schema::create('prod_entrantes', function (Blueprint $table) {
            $table->id('NroCompra');
            $table->integer('Cantidad');
            $table->decimal('Costo');
            $table->foreignId('CodItem')->references('CodItem')->on('items');
            $table->foreignId('IdCompra')->references('IdCompra')->on('nota_compras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_entrantes');
    }
};
