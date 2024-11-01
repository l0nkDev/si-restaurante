<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'IP', 'Username', 'Action', 'Table', 'Row'
    ];

    protected $nullable = [
        'Table', 'Row'
    ];
}
