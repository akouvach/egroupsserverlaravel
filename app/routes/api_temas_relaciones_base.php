<?php

/*
----Creado----2020-07-08 18:41:45.8948401 -0300 -03 m=+1.809887001
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\temas_relacionesController.php');

Route::get('temas_relaciones', function () {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		return response($temas_relaciones->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('temas_relaciones', function (Request $request) {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$res = $temas_relaciones->create($request->idTema,$request->idTemaRel);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('temas_relaciones', function (Request $request) {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$res = $temas_relaciones->update($request->idTema,$request->idTemaRel);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>