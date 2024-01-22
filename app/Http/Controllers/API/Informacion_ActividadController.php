<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Informacion;
use App\Models\Informacion_Actividad;;




class Informacion_ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informacion_actividad = new Informacion_Actividad();
        return response()->json($informacion_actividad,200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $informacion_actividad = new Informacion_Actividad();
        $informacion_actividad->Nombre_Mascota =$request->Nombre_Mascota;
        $informacion_actividad->Edad =$request->Edad;
        $informacion_actividad->Raza =$request->Raza;
        $informacion_actividad->Peso =$request->Peso;
        $informacion_actividad->id_informacion =$request->id_informacion;
        $informacion_actividad->id_actividad =$request->id_actividad;
        $informacion_actividad->save();
        return response()->json($informacion_actividad, 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informacion_actividad = Informacion_Actividad::find($id);
        return response()->json($informacion_actividad,200);
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
        $informacion_actividad = Informacion_Actividad::find($id);

        $informacion_actividad->Nombre_Mascota =$request->Nombre_Mascota;
        $informacion_actividad->Edad =$request->Edad;
        $informacion_actividad->Raza =$request->Raza;
        $informacion_actividad->Peso =$request->Peso;
        $informacion_actividad->id_informacion =$request->id_informacion;
        $informacion_actividad->id_actividad =$request->id_actividad;
        $informacion_actividad->update();
        return response()->json($informacion_actividad, 200);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informacion_actividad = Informacion_Actividad::find($id);
        if($informacion_actividad){
        $informacion_actividad->delete();
        return response()->json($informacion_actividad, 200);
    }
}
};