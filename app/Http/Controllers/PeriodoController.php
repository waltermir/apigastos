<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\periodo;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all();
        return response()->json(['datos'=>$periodos],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->input('periodo') || !$request->input('sueldo')){
            return response()->json(['mensaje'=> 'Faltan datos para poder dar de alta el periodo', 'codigo' => 422],422);
        }
        
        Periodo::create($request->all());
        return response()->json(['mensaje'=>'Periodo insertado'],201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $periodo = Periodo::find($id);
        
        IF (!$periodo){
                return response()->json(['mensaje'=> 'No existe el periodo', 'codigo' => 404],404);
        }
        
        $sueldo = $request->input('sueldo');
            
        if ($sueldo > 0 ){
            $periodo->sueldo = $sueldo;
            $periodo->save();
                 return response()->json(['mensaje'=> 'Cambio Realizado', 'codigo' => 200],200);
        } else {
                 return response()->json(['mensaje'=> 'Cambio No Realizado', 'codigo' => 422],422);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = Periodo::find($id);
        
        IF (!$periodo){
                return response()->json(['mensaje'=> 'No existe el periodo', 'codigo' => 404],404);
        }
        
        $periodo->delete();
        
        return response()->json(['mensaje'=> 'Periodo eliminado', 'codigo' => 200],200);
    }
}
