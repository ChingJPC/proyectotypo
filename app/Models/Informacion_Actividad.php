<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion_Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
     'Nombre_Mascota',
     'Edad',
     'Raza',
     'Peso',
     'id_informacion',
     'id_actividad'
    ];


    public $table  = "informacion_actividad";

    public $timestamps = false;

    // Relación con el modelo Informacion
    public function informacion()
    {
        return $this->belongsTo(Informacion::class, 'id_informacion');
    }

    // Relación con el modelo Actividad
    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }

}
