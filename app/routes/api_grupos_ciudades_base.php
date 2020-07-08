<?php

/*
----Creado----2020-07-08 18:41:44.86071 -0300 -03 m=+0.775756901
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\grupos_ciudadesController.php');

Route::get('grupos_ciudades', function () {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		return response($grupos_ciudades->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('grupos_ciudades', function (Request $request) {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$res = $grupos_ciudades->create($request->idCiudad,$request->idGrupo,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('grupos_ciudades', function (Request $request) {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$res = $grupos_ciudades->update($request->idCiudad,$request->idGrupo,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>