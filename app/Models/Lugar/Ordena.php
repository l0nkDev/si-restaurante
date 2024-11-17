<?php

namespace App\Models\Lugar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordena extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $autoincrement = false;
    public $primaryKey = 'NroOrdena';

    protected $fillable = ['Cantidad', 'SubTotal', 'NumOrden', 'CodProd'];
}
