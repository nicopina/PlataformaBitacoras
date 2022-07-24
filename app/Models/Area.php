<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "ID_Area";
    protected $fillable = [
        'ID_Area',
        'Nombre'
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
