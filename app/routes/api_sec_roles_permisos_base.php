<?php

/*
----Creado----2020-07-08 18:41:45.5039222 -0300 -03 m=+1.418969101
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_roles_permisosController.php');

Route::get('sec_roles_permisos', function () {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		return response($sec_roles_permisos->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('sec_roles_permisos', function (Request $request) {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$res = $sec_roles_permisos->create($request->idRol,$request->idMenu,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('sec_roles_permisos', function (Request $request) {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$res = $sec_roles_permisos->update($request->idRol,$request->idMenu,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>