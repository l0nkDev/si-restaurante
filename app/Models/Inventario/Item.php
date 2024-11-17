<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'CodItem';

    public $fillable = ['CodItem','Nombre','Disponible','Cantidad'];
}
