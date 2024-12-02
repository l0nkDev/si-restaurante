<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends User
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idrole';

    protected $fillable = ['nombre'];
}

?>
