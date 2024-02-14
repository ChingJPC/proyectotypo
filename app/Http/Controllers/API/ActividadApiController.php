<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Agendamiento;

class ActividadApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividad = Actividad::all();
        return response()->json($actividad, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad->nombre_actividad =$request->nombre_actividad;
        $actividad->descripcion_actividad =$request->descripcion_actividad;
        $actividad->agendamiento_id =$request->agendamiento_id;
        
        $actividad->save();
        return response()->json($actividad, 201);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::find($id);
        return response()->json($actividad,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actividad = new Actividad();
        $actividad->nombre_actividad =$request->nombre_actividad;
        $actividad->descripcion_actividad =$request->descripcion_actividad;
        $actividad->agendamiento_id =$request->agendamiento_id;
        $actividad->update();
        return response()->json($actividad, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        if($actividad){
        $actividad->delete();
        return response()->json($actividad, 200);
    }else{
        return response()->json(['message' => 'actividad de Mascoto no encontrada'], 404); 
    }
    }
}
