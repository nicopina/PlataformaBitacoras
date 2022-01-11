<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = "ID_Usuario";
    protected $fillable = ['ID','Contraseña','Rol','Bloqueado','Nombre','Segundo_nombre','Apellido','Segundo_apellido','ID_Area'];
}
