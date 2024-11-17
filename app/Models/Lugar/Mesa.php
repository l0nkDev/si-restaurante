<?php

namespace App\Models\Lugar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $autoincrement = false;
    public $primaryKey = 'NroMesa';

    protected $fillable = ['NroMesa', 'Capacidad'];
}
