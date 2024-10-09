<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'IdMesa';

    protected $fillable = ['NroMesa', 'Capacidad'];
}