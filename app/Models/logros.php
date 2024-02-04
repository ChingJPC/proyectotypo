<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logros extends Model
{
    use HasFactory;

    public $timestamps = false;

 

    protected $fillable = [
        'tipoLogro',
        'tiempoSemanal',
        'dias'
   
    ];

    public $table = 'logros';
   

}
