<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accidente extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'trabajador_id',
        'area_id',
        'causa',
        'detalle',
        'responsable',
        'observaciones',
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
