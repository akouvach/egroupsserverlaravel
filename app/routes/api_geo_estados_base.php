<?php

/*
----Creado----2020-07-09 11:42:49.75602 -0300 -03 m=+0.178703601
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_estadosController.php');

Route::get('geo_estados', function () {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$json =json_encode($geo_estados->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('geo_estados/{id}', function ($id) {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$json = json_encode($geo_estados->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('geo_estados', function (Request $request) {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$json = $geo_estados->create($request->estado,$request->idPais);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('geo_estados', function (Request $request) {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$json = $geo_estados->update($request->id,$request->estado,$request->idPais);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('geo_estados', function (Request $request) {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$json = $geo_estados->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>