<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteMixto extends Model
{
    use HasFactory;

    protected $fillable = [
        'miembro1',
        'miembro2',
        'miembro3',
        'miembro4',
        'fecha',
        'detalle',
        'observaciones',
    ];

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
}
