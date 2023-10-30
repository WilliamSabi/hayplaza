<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evento extends Model
{
    use HasFactory;

    // Obtener fechas intermedias de cada evento
    public $fechas = [];

    //Obtener el año, mes y dia por separado

    protected $dates = [
        'inicio',
        'final'
    ];

    public function getInicioAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getFinalAttribute($date)
    {
        return Carbon::parse($date);
    }
}
