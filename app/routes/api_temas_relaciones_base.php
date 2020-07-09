<?php

/*
----Creado----2020-07-09 11:42:50.3388019 -0300 -03 m=+0.761485501
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\temas_relacionesController.php');

Route::get('temas_relaciones', function () {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$json =json_encode($temas_relaciones->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('temas_relaciones/{idTema}/{idTemaRel}', function ($idTema,$idTemaRel) {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$json = json_encode($temas_relaciones->getByPrim($idTema,$idTemaRel));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('temas_relaciones', function (Request $request) {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$json = $temas_relaciones->create($request->idTema,$request->idTemaRel);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('temas_relaciones', function (Request $request) {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$json = $temas_relaciones->update($request->idTema,$request->idTemaRel);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('temas_relaciones', function (Request $request) {
	$json = '';
	try {
		$temas_relaciones = new Temas_relacionesController();
		$json = $temas_relaciones->delByPrim($request->idTema,$request->idTemaRel); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>