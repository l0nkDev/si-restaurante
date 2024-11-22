<?php

namespace App\Models\Cocina;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contiene extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['CodProd', 'CodIngr', 'Cantidad', 'Unidad'];
}
