<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdEntrante extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'NroCompra';

    protected $fillable = ['Cantidad', 'Costo', 'CodItem', 'IdCompra'];
}
