<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "ID_Bitacora";

    protected $fillable = [
        'ID_Bitacora',
        'ID_Usuario',
        'Fecha'
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
