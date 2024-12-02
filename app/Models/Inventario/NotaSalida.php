<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaSalida extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'NroSalida';

    protected $fillable = ['Cantidad', 'FechaHra', 'CodItem'];
}
