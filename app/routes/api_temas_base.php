<?php

/*
----Creado----2020-07-08 18:41:45.7856058 -0300 -03 m=+1.700652701
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\temasController.php');

Route::get('temas', function () {
	$json = '';
	try {
		$temas = new TemasController();
		return response($temas->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('temas', function (Request $request) {
	$json = '';
	try {
		$temas = new TemasController();
		$res = $temas->create($request->id,$request->tema,$request->tipo);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('temas', function (Request $request) {
	$json = '';
	try {
		$temas = new TemasController();
		$res = $temas->update($request->id,$request->tema,$request->tipo);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>