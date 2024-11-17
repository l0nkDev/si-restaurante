<?php

namespace App\Models\Lugar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $autoincrement = false;
    public $primaryKey = 'NumOrden';

    protected $fillable = ['FechaHra', 'IDVenta', 'IdEmpleado', 'IdCliente', 'IdEstado'];
    protected $nullable = ['IdCliente'];
}
