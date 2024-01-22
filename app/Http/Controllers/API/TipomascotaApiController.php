<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Tipomascota;
use App\Models\Informacion;
use App\Http\Controllers\Controller;


class TipomascotaApiController extends Controller
{
    function __constructor(){
        $this->middleware('permission:ver-rol | crear-tipomascota | editar-tipomascota | borrar-tipomascota',['only'=>['index']]);
        $this->middleware('permission:crear-tipomascota', ['only'=>['create','store']]);
        $this->middleware('permission:editar-tipomascota', ['only'=>['editar','update']]);
        $this->middleware('permission:borrar-tipomascota', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipomascota = Tipomascota::paginate(10);
        return response()->json($tipomascota, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipomascota = new Tipomascota();
        $tipomascota->Tipo_Mascota =$request->Tipo_Mascota;
        $tipomascota->save();
        return response()->json($tipomascota, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipomascota = Tipomascota::find($id);
        return response()->json($tipomascota,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $tipomascota = Tipomascota::find($id);

        $tipomascota->Tipo_Mascota =$request->Tipo_Mascota;
        $tipomascota->update();
        return response()->json($tipomascota, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $tipomascota = Informacion::find($id);
        if($tipomascota){
        $tipomascota->delete();
        return response()->json($tipomascota, 200);
    }else{
        return response()->json(['message' => 'Tipo mascota no encontrada'], 404); 
    }
      
    }
}
