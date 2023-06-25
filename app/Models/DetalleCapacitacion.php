<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCapacitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_capacitacion',
        'id_trabajador',
    ];

    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class, 'id_capacitacion');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('id_capacitacion', 'LIKE', "%$val%")
            ->orWhere('id_trabajador', 'LIKE', "%$val%");
    }
}
