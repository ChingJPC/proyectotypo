<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logros;
use App\Models\User_has_logros;

class LogrosApiController extends Controller
{
    public function index()
    {
        $logros = Logros::all();
        return response()->json($logros, 200);
    }
    
   /* public function store(Request $request)
    {
        $request->validate([
            'tipoLogro' => 'required|string',
            'tiempoSemanal' => 'required|time',
            'dias' => 'required|integer'
        ]);
    
        $logro = Logros::create($request->all());
        return response()->json($logro, 201);
    }*/

    public function store(Request $request)
{
    $request->validate([
        'tipoLogro' => 'required|string',
        'tiempoSemanal' => 'required|date_format:H:i:s',
        'dias' => 'required|integer'
    ]);

    $logro = Logros::create($request->all());
    return response()->json($logro, 201);
}

    public function show($id)
    {
        $logro = Logros::findOrFail($id);
        return response()->json($logro, 200);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipoLogro' => 'required|string',
            'tiempoSemanal' => 'required|date_format:H:i:s',
            'dias' => 'required|integer'
        ]);
    
        $logro = Logros::findOrFail($id);
        $logro->update($request->all());
        return response()->json($logro, 200);
    }
    
    public function destroy($id)
    {
        $logro = Logros::findOrFail($id);
        $logro->delete();
        return response()->json(null, 204);
    }
    

    public function asignarLogro(Request $request)
    {
        $request->validate([
            'tiempoSemanal' => 'required|date_format:H:i:s',
            'dias' => 'required|integer',
            'usuario_id' => 'required|integer'
        ]);
        
        $tiempoSemanal = $request->tiempoSemanal;
        $diasInteraccion = $request->dias;
        // Corregir el nombre del campo dias_interaccion a dias
    
        $logro = Logros::where('tiempoSemanal', $tiempoSemanal)
            ->where('dias', $diasInteraccion)
            ->first();
    
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
    
    





    public function logrosAsignadosAUsuario($usuario_id)
    {
        $logrosAsignados = User_has_logros::where('user_id', $usuario_id)
                                           ->with('logros') // Cambio aquí
                                           ->get();
    
        return response()->json($logrosAsignados, 200);
    }
}    








