<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reporte_cumplimiento; 

class reporte_cumplimientoApiController extends Controller
{
    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'si_cumplio' => 'required|boolean',
            'no_cumplio' => 'required|boolean',
            'usuario_id' => 'required|integer',
            'logros_id' => 'required|integer'

        ]);

        
        $reporte = new reporte_cumplimiento(); 
        $reporte->si_cumplio = $request->si_cumplio;
        $reporte->no_cumplio = $request->no_cumplio;
        $reporte->user_id = $request->usuario_id;
        $reporte->logros_id = $request->logros_id;
       
      
        $reporte->save();

        
        return response()->json($reporte, 201);
    }
}
