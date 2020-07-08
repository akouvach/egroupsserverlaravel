<?php

/*
----Creado----2020-07-08 18:41:44.9887383 -0300 -03 m=+0.903785201
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\grupos_relacionesController.php');

Route::get('grupos_relaciones', function () {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		return response($grupos_relaciones->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('grupos_relaciones', function (Request $request) {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$res = $grupos_relaciones->create($request->grupo_origen,$request->grupo_destino,$request->tipo_relacion,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('grupos_relaciones', function (Request $request) {
	$json = '';
	try {
		$grupos_relaciones = new Grupos_relacionesController();
		$res = $grupos_relaciones->update($request->grupo_origen,$request->grupo_destino,$request->tipo_relacion,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>