<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporte_cumplimiento extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'si_cumplio',
        'no_cumplio',
        'user_id',
        'logros_id'
   
    ];

    public $table = 'reporte_cumplimiento';

    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    
   

    public function logros(){
        return $this->hasMany(logros::class, 'logros_id', 'id');
  }



 
  
}
