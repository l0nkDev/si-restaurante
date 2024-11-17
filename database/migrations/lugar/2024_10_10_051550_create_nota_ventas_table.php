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
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->id('IDVenta');
            $table->dateTime('FechaHora');
            $table->decimal('Total', 12);
            $table->boolean('FuePagado');
            $table->Integer('NroMesa');
            $table->bigInteger('IdEmpleado')->unsigned();
            $table->bigInteger('IdCliente')->unsigned()->nullable();
            $table->foreign('NroMesa')->references('NroMesa')->on('mesas');
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('empleados');
            $table->foreign('IdCliente')->references('IdCliente')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_ventas');
    }
};
