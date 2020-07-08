<?php

/*
----Creado----2020-07-08 18:41:44.726494 -0300 -03 m=+0.641540901
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\gruposController.php');

Route::get('grupos', function () {
	$json = '';
	try {
		$grupos = new GruposController();
		return response($grupos->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('grupos', function (Request $request) {
	$json = '';
	try {
		$grupos = new GruposController();
		$res = $grupos->create($request->id,$request->descripcion,$request->grupo,$request->idCreador,$request->idOrganigrama,$request->tipo,$request->tags);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('grupos', function (Request $request) {
	$json = '';
	try {
		$grupos = new GruposController();
		$res = $grupos->update($request->id,$request->descripcion,$request->grupo,$request->idCreador,$request->idOrganigrama,$request->tipo,$request->tags);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>