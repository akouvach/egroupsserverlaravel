<?php

/*
----Creado----2020-07-09 11:42:49.7060705 -0300 -03 m=+0.128754101
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_ciudadesController.php');

Route::get('geo_ciudades', function () {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$json =json_encode($geo_ciudades->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('geo_ciudades/{id}', function ($id) {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$json = json_encode($geo_ciudades->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('geo_ciudades', function (Request $request) {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$json = $geo_ciudades->create($request->idEstado,$request->idPais);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('geo_ciudades', function (Request $request) {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$json = $geo_ciudades->update($request->id,$request->idEstado,$request->idPais);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('geo_ciudades', function (Request $request) {
	$json = '';
	try {
		$geo_ciudades = new Geo_ciudadesController();
		$json = $geo_ciudades->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>