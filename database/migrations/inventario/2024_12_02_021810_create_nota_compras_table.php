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
        Schema::dropIfExists('nota_compras');
        Schema::create('nota_compras', function (Blueprint $table) {
            $table->id('IdCompra');
            $table->dateTime('FechaHra');
            $table->decimal('Total', 12);
            $table->foreignId('CodProv')->references('CodProv')->on('proveedors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_compras');
    }
};
