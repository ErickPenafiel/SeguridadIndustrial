<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoAuditoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'auditoria_id',
    ];
}
