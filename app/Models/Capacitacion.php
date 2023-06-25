<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_area',
        'nombre',
        'contenido',
        'fechaInicio',
        'fechaFin',
        'estado',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
