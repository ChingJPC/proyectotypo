<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamiento extends Model
{
    use HasFactory;

    public $table  = "agendamiento";

    protected $fillable = [
        'tiempo_asignado_actividad',
        'Fecha_Agendamiento',
        'confirmacion',
        'user_id',
        'reportecumplimiento_id'
    ];

    public function user(){
        return $this->hasMany(User::class, 'user_id', 'id');
  }

  public function reportec_umplimiento(){
        return $this->hasMany(Reporte_cumplimiento::class,'reportecumplimiento_id', 'id');
  }
     
}
