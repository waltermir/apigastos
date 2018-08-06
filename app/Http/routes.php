<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/test', function(){
	echo "Esto es una simple prueba!!";
});

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('gastos/periodo/{perio}/total', 'GastoPeriodoController@totalGasto');
Route::get('gastos/periodo/{perio}', 'GastoPeriodoController@show');

Route::resource('gastos','GastoController');
Route::resource('periodos','PeriodoController');
Route::resource('gastosperiodos','GastoPeriodoController');
Route::post('oauth/access_token', function({
            return Response::json(Authorizer::issueAccessToken();)
}));





