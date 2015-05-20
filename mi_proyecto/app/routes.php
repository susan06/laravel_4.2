<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/** probrando respuestas basicas ****/
Route::get('saludos', function()
{
 return "hola";
});

/** probrando respuestas con HTML ****/
Route::get('html', function()
{
return '<!doctype html>
 <html lang="es">
 <head>
 <meta charset="UTF-8">
 <title>Prueba</title>
 </head>
 <body>
<p>¡siii! estoy usando HTML </p>
 </body>
 </html>';
});

/** llamando a una vista ****/
Route::get('ver', function()
{
 return View::make('simple');
});

/** pasando parametros ****/
Route::get('animales/{animal}', function($animal)
 {
 $data['animal'] = $animal;

 return View::make('animales', $data);
});

/** reedireccionar ****/
Route::get('primera', function()
 {
 return Redirect::to('segunda');
 });

Route::get('segunda', function()
 {
 return 'Segunda ruta.';
 });
 
 /** Objeto response ****/
Route::get('respuesta/markdown', function()
 {
 $response = Response::make('***Hola mundo***', 200);
 $response->headers->set('Content-Type', 'text/x-markdown');
 return $response;
 });
 
Route::get('respuesta/tiempo_vida', function()
 {
 $response = Response::make('Bond, James Bond.', 200);
 $response->setTtl(60);
 return $response;
 });

Route::get('respuesta/json', function()
 {
 $data = array('girasol', 'rosas', 'amapolas');
 return Response::json($data);
 });
 
 /** Objeto response respuestas de descargas ****/
Route::get('respuesta/descarga', function()
 {
 $file = 'ruta_a_mi_archivo.pdf';
 return Response::download($file);
 });
 
 /** filtro asignado a la ruta ****/
Route::get('filtro', array(
 'before' => 'dia',
 function()
 {
 return View::make('simple');
 }
 ));