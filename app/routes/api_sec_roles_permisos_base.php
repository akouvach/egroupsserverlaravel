<?php

/*
----Creado----2020-07-09 11:42:50.180048 -0300 -03 m=+0.602731601
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_roles_permisosController.php');

Route::get('sec_roles_permisos', function () {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$json =json_encode($sec_roles_permisos->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('sec_roles_permisos/{idRol}/{idMenu}', function ($idRol,$idMenu) {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$json = json_encode($sec_roles_permisos->getByPrim($idRol,$idMenu));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('sec_roles_permisos', function (Request $request) {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$json = $sec_roles_permisos->create($request->idRol,$request->idMenu,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('sec_roles_permisos', function (Request $request) {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$json = $sec_roles_permisos->update($request->idRol,$request->idMenu,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('sec_roles_permisos', function (Request $request) {
	$json = '';
	try {
		$sec_roles_permisos = new Sec_roles_permisosController();
		$json = $sec_roles_permisos->delByPrim($request->idRol,$request->idMenu); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>