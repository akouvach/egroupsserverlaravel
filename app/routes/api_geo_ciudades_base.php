<?php

/*
----Creado----2020-07-08 18:41:44.3936581 -0300 -03 m=+0.308705001
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_ciudadesController.php');

Route::get('geo_ciudades', function () {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		return response($geo_ciudades->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('geo_ciudades', function (Request $request) {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$res = $geo_ciudades->create($request->id,$request->idEstado,$request->idPais);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('geo_ciudades', function (Request $request) {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$res = $geo_ciudades->update($request->id,$request->idEstado,$request->idPais);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>