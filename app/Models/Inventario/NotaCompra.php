<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'IdCompra';

    protected $fillable = ['Fecha', 'Total', 'CodProv'];
    protected $dates = ['Fecha'];
}
