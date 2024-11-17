<?php

namespace App\Models\Admin;

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

    public static function IP(): string {
        try {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } finally {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
}
