<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlSeguridad extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_trabajador',
        'id_area',
        'fecha',
        'puntaje'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
