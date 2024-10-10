<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('idrole');
            $table->string('nombre');
        });
        $def = new Role(['nombre' => 'Invitado']);
        $adm = new Role(['nombre'=>'Administración']);
        $caj = new Role(['nombre'=>'Caja']);
        $mes = new Role(['nombre'=>'Mesa']);
        $coc = new Role(['nombre'=>'Cocina']);
        $def->save(); $adm->save(); $caj->save(); $mes->save(); $coc->save();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
