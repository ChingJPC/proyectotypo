<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamiento extends Model
{
    use HasFactory;

    public $table  = "agendamiento";

    protected $fillable = [
        'Actividades_a_Realizar',
        'Fecha_Agendamiento',
        'Tiempo_Disponible',
        'Nombre_Mascota',
    ];

    public function actividad(){
        return $this->hasMany(Actividad::class, 'id_actividad', 'id');
  }
     
}
