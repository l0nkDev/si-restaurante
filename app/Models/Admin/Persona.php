<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    public $primaryKey = 'IdPersona';

    public $fillable = ['CI','Nombre'];
}
