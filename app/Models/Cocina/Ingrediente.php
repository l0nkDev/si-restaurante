<?php

namespace App\Models\Cocina;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'CodIngr';
}
