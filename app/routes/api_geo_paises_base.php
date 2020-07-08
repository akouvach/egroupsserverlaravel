<?php

/*
----Creado----2020-07-08 18:41:44.5980733 -0300 -03 m=+0.513120201
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_paisesController.php');

Route::get('geo_paises', function () {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		return response($geo_paises->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('geo_paises', function (Request $request) {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$res = $geo_paises->create($request->id,$request->nombre,$request->descripcion,$request->iso3,$request->codigo);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('geo_paises', function (Request $request) {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$res = $geo_paises->update($request->id,$request->nombre,$request->descripcion,$request->iso3,$request->codigo);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>