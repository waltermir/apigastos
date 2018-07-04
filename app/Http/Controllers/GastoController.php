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
        
        
        if (!$request->input('codigo') || !$request->input('descripcion')){
            return response()->json(['mensaje'=> 'Faltan datos para poder dar de alta el gasto', 'codigo' => 422],422);
        }
        
        Gasto::create($request->all());
        return response()->json(['mensaje'=>'Gasto insertado'],201);
        
        
    }
    
    public function update(Request $request, $id){
        
      
        $gasto = Gasto::find($id);
        
        IF (!$gasto){
                return response()->json(['mensaje'=> 'No existe el gasto', 'codigo' => 404],404);
        }
        
        $descripcion = $request->input('descripcion');
            
        if ($descripcion != NULL && $descripcion != ''){
            $gasto->descripcion = $descripcion;
            $gasto->save();
                 return response()->json(['mensaje'=> 'Cambio Realizado', 'codigo' => 200],200);
        } else {
                 return response()->json(['mensaje'=> 'Cambio No Realizado', 'codigo' => 422],422);
            
        }
    
    }
    
    public function destroy($id){
        
        $gasto = Gasto::find($id);
        
        IF (!$gasto){
                return response()->json(['mensaje'=> 'No existe el gasto', 'codigo' => 404],404);
        }
        
        $gasto->delete();
        
        return response()->json(['mensaje'=> 'Gasto eliminado', 'codigo' => 200],200);
    }
    
    
}