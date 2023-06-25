<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReunionComite extends Model
{
    use HasFactory;

    protected $fillable = [
        'comite_id',
        'fecha',
        'detalle',
        'estado',
    ];
}
