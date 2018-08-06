<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class Verificador extends Controller
{
    public function verificar($usuario, $contrasena){
        $credentials = [
            'email' => $username,
            'password' => $password
            ];
        if(Auth::once($credentials)){
            return Auth::user()->id;
        }
        return false;
    }
}
