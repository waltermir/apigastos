<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\gastosPeriodo;
use App\gasto;
use App\periodo;

class GastoPeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $gastoPeriodo = GastosPeriodo::all();
          return response()->json(['datos'=>$gastoPeriodo],200);
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
        
        $gasto = Gasto::where('codigo',$request->input('gasto'))->get();
        
        if (!$gasto || $gasto->count() == 0) {
          return response()->json(['mensaje'=> 'No se encontro el id del gasto', 'codigo' => 422],422);
        }
        
        $periodo = Periodo::where('periodo',$request->input('periodo'))->get();
        
        if (!$periodo || $periodo->count() == 0 ) {
          return response()->json(['mensaje'=> 'No se encontro el id del periodo', 'codigo' => 422],422);
        }
        
        $gastoPeriodo = new GastosPeriodo;
        $gastoPeriodo->periodo_id = $periodo->first()->id;
        $gastoPeriodo->gasto_id   = $gasto->first()->id;
        $gastoPeriodo->pagar     = $request->input('pagar');
        $gastoPeriodo->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
