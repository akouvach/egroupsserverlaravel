<?php

/*
----Creado----2020-07-08 18:41:45.2489865 -0300 -03 m=+1.164033401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\organigramasController.php');

Route::get('organigramas', function () {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		return response($organigramas->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('organigramas', function (Request $request) {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$res = $organigramas->create($request->id,$request->area,$request->idAreaPadre);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('organigramas', function (Request $request) {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$res = $organigramas->update($request->id,$request->area,$request->idAreaPadre);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>