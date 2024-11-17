<?php

namespace App\Models\Lugar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaVenta extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $autoincrement = false;
    public $primaryKey = 'IDVenta';

    protected $fillable = ['FechaHora', 'Total', 'FuePagado', 'NroMesa', 'IdEmpleado', 'IdCliente'];
    Protected $nullable = ['IdCliente'];
}
