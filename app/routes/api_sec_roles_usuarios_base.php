<?php

/*
----Creado----2020-07-08 18:41:45.6495018 -0300 -03 m=+1.564548701
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_roles_usuariosController.php');

Route::get('sec_roles_usuarios', function () {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		return response($sec_roles_usuarios->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('sec_roles_usuarios', function (Request $request) {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$res = $sec_roles_usuarios->create($request->idUsuario,$request->idRol,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('sec_roles_usuarios', function (Request $request) {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$res = $sec_roles_usuarios->update($request->idUsuario,$request->idRol,$request->fechaDesde);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>