<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDotacion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_dotacion',
        'id_insumo',
        'cantidad',
    ];

    public function dotacion() {
        return $this->belongsTo(DotacionEPP::class, 'id_dotacion');
    }

    public function insumo() {
        return $this->belongsTo(Insumo::class, 'id_insumo');
    }
}
