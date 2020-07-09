<?php

/*
----Creado----2020-07-09 11:42:50.2359344 -0300 -03 m=+0.658618001
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_roles_usuariosController.php');

Route::get('sec_roles_usuarios', function () {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$json =json_encode($sec_roles_usuarios->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('sec_roles_usuarios/{idUsuario}/{idRol}/{fechaDesde}', function ($idUsuario,$idRol,$fechaDesde) {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$json = json_encode($sec_roles_usuarios->getByPrim($idUsuario,$idRol,$fechaDesde));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('sec_roles_usuarios', function (Request $request) {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$json = $sec_roles_usuarios->create($request->idUsuario,$request->idRol,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('sec_roles_usuarios', function (Request $request) {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$json = $sec_roles_usuarios->update($request->idUsuario,$request->idRol,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('sec_roles_usuarios', function (Request $request) {
	$json = '';
	try {
		$sec_roles_usuarios = new Sec_roles_usuariosController();
		$json = $sec_roles_usuarios->delByPrim($request->idUsuario,$request->idRol,$request->fechaDesde); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>