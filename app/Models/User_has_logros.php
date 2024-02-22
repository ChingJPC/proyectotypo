<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Logros;
use App\Models\User;


class User_has_logros extends Model
{
    use HasFactory;


    public $table  = "user_has_logros";

    protected $fillable = [
        'user_id',
        'logros_id'

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function logros(){
        return $this->belongsTo(Logros::class, 'logros_id', 'id');
    }
    

}
