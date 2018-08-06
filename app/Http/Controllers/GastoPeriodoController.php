<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
     public function __construct (){
        
        $this->middleware('oauth',['only'=>['store','update','destroy']]);
        
    }
    
    public function index()
    {
        
          $gastos = DB::table('gastos_periodo')
            ->join('periodo', 'periodo_id', '=', 'periodo.id')
            ->join('gasto', 'gasto_id', '=', 'gasto.id')
            ->select('periodo.periodo', 'gasto.codigo', 'gasto.descripcion','gastos_periodo.pagar' )
            ->get();
            
          return response()->json(['datos'=>$gastos],200);
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
    public function show($periodo)
    {
            $gastos = DB::table('gastos_periodo')
            ->join('periodo', 'periodo_id', '=', 'periodo.id')
            ->join('gasto', 'gasto_id', '=', 'gasto.id')
            ->where('periodo.periodo', '=',$periodo)
            ->select('periodo.periodo', 'gasto.codigo', 'gasto.descripcion','gastos_periodo.pagar' )
            ->get();
            
          return response()->json(['datos'=>$gastos],200);
          
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
    
    public function totalGasto($perio)
    {
          //$total = DB::table('users')->where('name', 'John')->)count();
          
          
            $gastos = DB::table('gastos_periodo')
            ->join('periodo', 'periodo_id', '=', 'periodo.id')
            ->where('periodo',$perio)
            ->select('sueldo')->sum('gastos_periodo.pagar');
            
          return response()->json(['gasto_periodo'=>$gastos],200);
          
  

    }
    
}
