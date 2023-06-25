<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialComite extends Model
{
    use HasFactory;

    protected $fillable = [
        'comite_id',
        'miembro1',
        'miembro2',
        'miembro3',
        'miembro4',
        'fecha',
        'detalle',
        'observaciones',
    ];

    public function comiteMixto()
    {
        return $this->belongsTo(ComiteMixto::class, 'comite_id');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'miembro1');
    }

    public function trabajador2()
    {
        return $this->belongsTo(Trabajador::class, 'miembro2');
    }

    public function trabajador3()
    {
        return $this->belongsTo(Trabajador::class, 'miembro3');
    }

    public function trabajador4()
    {
        return $this->belongsTo(Trabajador::class, 'miembro4');
    }

    public function getFechaAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
