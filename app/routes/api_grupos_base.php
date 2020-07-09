<?php

/*
----Creado----2020-07-09 11:42:49.8655708 -0300 -03 m=+0.288254401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\gruposController.php');

Route::get('grupos', function () {
	$json = '';
	try {
		$grupos = new GruposController();
		$json =json_encode($grupos->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('grupos/{id}', function ($id) {
	$json = '';
	try {
		$grupos = new GruposController();
		$json = json_encode($grupos->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('grupos', function (Request $request) {
	$json = '';
	try {
		$grupos = new GruposController();
		$json = $grupos->create($request->descripcion,$request->grupo,$request->idCreador,$request->idOrganigrama,$request->tipo,$request->tags);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('grupos', function (Request $request) {
	$json = '';
	try {
		$grupos = new GruposController();
		$json = $grupos->update($request->id,$request->descripcion,$request->grupo,$request->idCreador,$request->idOrganigrama,$request->tipo,$request->tags);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('grupos', function (Request $request) {
	$json = '';
	try {
		$grupos = new GruposController();
		$json = $grupos->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>