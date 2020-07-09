<?php

/*
----Creado----2020-07-09 11:42:50.1306392 -0300 -03 m=+0.553322801
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_rolesController.php');

Route::get('sec_roles', function () {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$json =json_encode($sec_roles->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('sec_roles/{id}', function ($id) {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$json = json_encode($sec_roles->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('sec_roles', function (Request $request) {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$json = $sec_roles->create($request->rol,$request->esAdminGlogal,$request->esAdminGrupo,$request->esAdminGeografico);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('sec_roles', function (Request $request) {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$json = $sec_roles->update($request->id,$request->rol,$request->esAdminGlogal,$request->esAdminGrupo,$request->esAdminGeografico);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('sec_roles', function (Request $request) {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$json = $sec_roles->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>