<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Trabajador;

class DotacionEPP extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreDotacion',
        'id_area',
        'cantidad',
        'periodoDotacion',
        'fechaDotacion',
        'id_trabajador',
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
