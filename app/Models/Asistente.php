<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    use HasFactory;
    // Esto le permitirá a Laravel saber que se permite la asignación masiva de esa columna
    protected $fillable = [
        // ... otras columnas
        'asistio',
    ];
}
