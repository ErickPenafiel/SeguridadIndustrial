<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iper extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'sector',
        'actividad',
        'peligro',
        'riesgo',
        'daño',
        'medidas',
        'equipos',
        'procedimientos',
        'capacitaciones',
        'personasExpuestas',
        'frecuencia',
        'valorProbabilidad',
        'indiceProbabilidad',
        'severidad',
        'indiceRiesgo',
        'valoracion',
        'medidasControl',
        'jerarquiaControl',
        'responsables',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
