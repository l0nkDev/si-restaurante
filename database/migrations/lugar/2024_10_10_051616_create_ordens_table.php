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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id('NumOrden');
            $table->dateTime('FechaHra');
            $table->bigInteger('IDVenta')->unsigned();
            $table->bigInteger('IdEmpleado')->unsigned();
            $table->bigInteger('IdCliente')->unsigned()->nullable();
            $table->bigInteger('IdEstado')->unsigned();
            $table->foreign('IDVenta')->references('IDVenta')->on('nota_ventas');
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('empleados');
            $table->foreign('IdCliente')->references('IdCliente')->on('clientes');
            $table->foreign('IdEstado')->references('IdEstado')->on('estado_ordens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
