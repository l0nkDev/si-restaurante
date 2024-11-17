<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'CodProv';

    public $fillable = ['Descripcion','Ubicacion', 'Telefono'];
}
