<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'id_area',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
