<?php

namespace App\Models\Cocina;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaCocina extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'NroSalida';

    protected $fillable = ['FechaHra', 'Cantidad', 'CodProd'];
}
