<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reporte_cumplimiento; 
use App\Models\user;
use App\Models\logros;

class reporte_cumplimientoApiController extends Controller

{

    
    public function index()
    {

        $reporte_cumplimiento = Reporte_cumplimiento::all(); // Obtener todos los registros de la tabla de logros
        return response()->json($reporte_cumplimiento, 200);

    }

    public function store(Request $request)
    {
        
        $reporte_cumplimiento = new Reporte_cumplimiento();
        $reporte_cumplimiento-> si_cumplio = $request->si_cumplio;
        $reporte_cumplimiento->no_cumplio=$request->no_cumplio;
        $reporte_cumplimiento->user_id=$request->user_id;
        $reporte_cumplimiento->logros_id=$request->logros_id;
        $reporte_cumplimiento->save();
        return response()->json($reporte_cumplimiento, 201);

    }

    public function show($id)
    {
        $reporte_cumplimiento = Reporte_cumplimiento::find($id);
        return response()->json($reporte_cumplimiento,200); 
    }

    public function update(Request $request, $id)
    {
            $reporte_cumplimiento = Reporte_cumplimiento::find($id);
            $reporte_cumplimiento-> si_cumplio = $request->si_cumplio;
            $reporte_cumplimiento->no_cumplio=$request->no_cumplio;
            $reporte_cumplimiento->user_id=$request->user_id;
            $reporte_cumplimiento->logros_id=$request->logros_id;
            $reporte_cumplimiento->update();
            return response()->json($reporte_cumplimiento, 201);
    }


    public function destroy($id)
    {
        $reporte_cumplimiento = Reporte_cumplimiento::find($id);
        if($reporte_cumplimiento){
        $reporte_cumplimiento->delete();
        return response()->json($reporte_cumplimiento, 200);
    }else{
        return response()->json(['message' => 'Informacion de reporte de cumplimiento no encontrada'], 404);
    }
    }



   /* public function guardar(Request $request)
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
    }*/
}