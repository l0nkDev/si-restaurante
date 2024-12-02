<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'IDReporte';

    protected $fillable = ['Tipo', 'First', 'FirstDat', 'Last', 'LastDat', 'FechaHra'];
}
