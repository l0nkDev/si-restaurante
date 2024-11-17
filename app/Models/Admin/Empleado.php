<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'IdEmpleado';
    public $fillable = ['IdEmpleado', 'Telefono'];
}
