<?php

namespace App\Models\Lugar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOrden extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $autoincrement = false;
    public $primaryKey = 'IdEstado';

    protected $fillable = ['Nombre'];
}
