<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipomascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_mascota',
 
    ];

    public $table  = "tipomascota";

    public $timestamps = false;



    public function informacion()
    {
        return $this->hasMany(Informacion::class,'id_mascota', 'id');
    }



    //public function salida_motivo(){
        //return $this->belongsToMany(Motivo::class, 'salidas', 'aprendiz_id', 'motivo_id')->withPivot('id', 'user_id', 'fecha', 'hora', 'duracion', 'otros')->using(Salida::class);

    //}

    //public function salida_user(){
       // return $this->belongsToMany(User::class, 'salidas', 'aprendiz_id', 'user_id');
    //}

}
