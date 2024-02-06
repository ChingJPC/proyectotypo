<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logros;
use App\Models\User;
use App\Models\User_has_logros;

class LogrosApiController extends Controller
{
    public function asignarLogro(Request $request)
    {
        
        $request->validate([
            'usuario_id' => 'required|integer',
            'tiempo_semanal' => 'required|string',
            'dias_interaccion' => 'required|integer',
        ]);

   
        $tiempoSemanal = $request->tiempo_semanal;
        $diasInteraccion = $request->dias_interaccion;

        
        $logro = Logros::where('tiempoSemanal', $tiempoSemanal)
                      ->where('dias', $diasInteraccion)
                      ->first();

                      return  response()->json(['logro' => $logro, 'message' => 'Logro asignado correctamente'], 200);
        
        if ($logro) {
           $new_logro = new User_has_logros();
           $new_logro->user_id = $request->usuario_id;
           $new_logro->logros_id = $logro->id;
           $new_logro->save();

            
            return response()->json(['logro' => $logro, 'message' => 'Logro asignado correctamente'], 200);
        } else {
           
            return response()->json(['message' => 'No se encontró ningún logro correspondiente'], 404);
        }
    }
}






