<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "ID_Entrada";

    protected $fillable = [
        'ID_Bitacora',
        'Hora',
        'Frecuencia',
        'Nombre_actividad',
        'Descripcion_actividad'
    ];
    public function setUpdatedAtAttribute($value)
    {
    // to Disable updated_at
    }
    public function setCreatedAtAttribute($value)
    {
    // to Disable created_at
    }
}

