<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoMaquinaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'maquinaria_id',
        'fecha',
        'trabajador_id',
    ];

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class);
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }
}
