<?php

/*
----Creado----2020-07-09 11:42:49.9690367 -0300 -03 m=+0.391720301
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\grupos_relacionesController.php');

Route::get('grupos_relaciones', function () {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$json =json_encode($grupos_relaciones->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('grupos_relaciones/{grupo_origen}/{grupo_destino}', function ($grupo_origen,$grupo_destino) {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$json = json_encode($grupos_relaciones->getByPrim($grupo_origen,$grupo_destino));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('grupos_relaciones', function (Request $request) {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$json = $grupos_relaciones->create($request->grupo_origen,$request->grupo_destino,$request->tipo_relacion,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('grupos_relaciones', function (Request $request) {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$json = $grupos_relaciones->update($request->grupo_origen,$request->grupo_destino,$request->tipo_relacion,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('grupos_relaciones', function (Request $request) {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$json = $grupos_relaciones->delByPrim($request->grupo_origen,$request->grupo_destino); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>