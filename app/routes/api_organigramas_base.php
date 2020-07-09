<?php

/*
----Creado----2020-07-09 11:42:50.0752558 -0300 -03 m=+0.497939401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\organigramasController.php');

Route::get('organigramas', function () {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$json =json_encode($organigramas->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('organigramas/{id}', function ($id) {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$json = json_encode($organigramas->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('organigramas', function (Request $request) {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$json = $organigramas->create($request->area,$request->idAreaPadre);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('organigramas', function (Request $request) {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$json = $organigramas->update($request->id,$request->area,$request->idAreaPadre);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('organigramas', function (Request $request) {
	$json = '';
	try {
		$organigramas = new OrganigramasController();
		$json = $organigramas->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>