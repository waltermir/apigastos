<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\gasto;

class GastoController extends Controller
{
    public function index (){
     $gastos = Gasto::all();
    return response()->json(['datos'=>$gastos],200);
    
        
    }
    
    public function store(Request $request){
        
        if (!$request->input('codigo') || $request->input('descripcion')){
            return response()->json(['mensaje'=> 'Faltan datos para poder dar de alta el gasto', 'codigo' => 422],422);
        }
        
        Gasto::create($request->all());
        return response()->json(['mensaje'=>'Gasto insertado'],201);
        
        
    }
}