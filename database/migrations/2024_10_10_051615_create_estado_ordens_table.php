<?php

use App\Models\EstadoOrden;
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
        Schema::create('estado_ordens', function (Blueprint $table) {
            $table->id('IdEstado');
            $table->string('Nombre');
        });

        $tom = new EstadoOrden(['Nombre' => 'Tomado']);
        $pre = new EstadoOrden(['Nombre' => 'Preparando']);
        $lis = new EstadoOrden(['Nombre' => 'Listo']);
        $ent = new EstadoOrden(['Nombre' => 'Entregado']);
        $tom->save(); $pre->save(); $lis->save(); $ent->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_ordens');
    }
};
