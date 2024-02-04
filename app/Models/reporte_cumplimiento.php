<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informacion extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'si_cumplio',
        'no_cumplio'
   
    ];

    public $table = 'reporte_cumplimiento';
   

    public function logros(){
        return $this->hasMany(logros::class, 'logros_id', 'id');
  }
 
  
}
