<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Item;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
        $table->foreignId('CodProd')->constrained('items', 'CodItem');
        $table->primary('CodProd');
        $table->integer('Precio');
        });
    }


    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'CodItem', 'CodProd');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
