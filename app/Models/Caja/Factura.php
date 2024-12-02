<?php

namespace App\Models\Caja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'IDFactura';
    public $fillable = ['FechaHra', 'Monto', 'CodigoControl', 'IDVenta'];
}
