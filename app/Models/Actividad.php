<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_actividad',
        'descripcion_actividad',
        'agendamiento_id',
        //'cumplida'

        
    ];

    public $table  = "actividad";
    public $timestamps = false;



  public function agendamiento()
{
    return $this->belongsTo(Agendamiento::class, 'agendamiento_id', 'id');
}
  

    
  
}
