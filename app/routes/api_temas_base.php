<?php

/*
----Creado----2020-07-09 11:42:50.2864867 -0300 -03 m=+0.709170301
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\temasController.php');

Route::get('temas', function () {
	$json = '';
	try {
		$temas = new TemasController();
		$json =json_encode($temas->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('temas/{id}', function ($id) {
	$json = '';
	try {
		$temas = new TemasController();
		$json = json_encode($temas->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('temas', function (Request $request) {
	$json = '';
	try {
		$temas = new TemasController();
		$json = $temas->create($request->tema,$request->tipo);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('temas', function (Request $request) {
	$json = '';
	try {
		$temas = new TemasController();
		$json = $temas->update($request->id,$request->tema,$request->tipo);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('temas', function (Request $request) {
	$json = '';
	try {
		$temas = new TemasController();
		$json = $temas->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>