<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $autoincrement = false;
    public $primaryKey = 'CodProd';

    protected $fillable = ['CodProd'];
}
