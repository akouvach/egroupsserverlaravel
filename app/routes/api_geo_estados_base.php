<?php

/*
----Creado----2020-07-08 18:41:44.4811355 -0300 -03 m=+0.396182401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_estadosController.php');

Route::get('geo_estados', function () {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		return response($geo_estados->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('geo_estados', function (Request $request) {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$res = $geo_estados->create($request->id,$request->estado,$request->idPais);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('geo_estados', function (Request $request) {
	$json = '';
	try {
		$geo_estados = new Geo_estadosController();
		$res = $geo_estados->update($request->id,$request->estado,$request->idPais);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>