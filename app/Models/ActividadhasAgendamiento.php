<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadhasAgendamiento extends Model
{
    use HasFactory;

    protected $table = 'actividad_has_agendamiento';

    protected $fillable = [
        'actividad_id',
        'agendamiento_id',
    ];
    public function actividad(){
        return $this->belongsTo(Actividad::class, 'actividad_id', 'id');
    }
    public function agendamiento(){
        return $this->belongsTo(Agendamiento::class, 'agendamiento_id', 'id');
    }
}
