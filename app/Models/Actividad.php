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
        
    ];

    public $table  = "actividad";
    public $timestamps = false;

    public function agendamiento(){
        return $this->hasMany(agendamiento::class, 'agendamiento_id', 'id');
  }
  

    
  
}
