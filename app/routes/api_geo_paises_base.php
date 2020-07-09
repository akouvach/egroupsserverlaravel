<?php

/*
----Creado----2020-07-09 11:42:49.8113264 -0300 -03 m=+0.234010001
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_paisesController.php');

Route::get('geo_paises', function () {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$json =json_encode($geo_paises->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('geo_paises/{id}', function ($id) {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$json = json_encode($geo_paises->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('geo_paises', function (Request $request) {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$json = $geo_paises->create($request->id,$request->nombre,$request->descripcion,$request->iso3,$request->codigo);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('geo_paises', function (Request $request) {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$json = $geo_paises->update($request->id,$request->nombre,$request->descripcion,$request->iso3,$request->codigo);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('geo_paises', function (Request $request) {
	$json = '';
	try {
		$geo_paises = new Geo_paisesController();
		$json = $geo_paises->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>