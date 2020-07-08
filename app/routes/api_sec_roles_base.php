<?php

/*
----Creado----2020-07-08 18:41:45.3760642 -0300 -03 m=+1.291111101
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_rolesController.php');

Route::get('sec_roles', function () {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		return response($sec_roles->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('sec_roles', function (Request $request) {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$res = $sec_roles->create($request->id,$request->rol,$request->esAdminGlogal,$request->esAdminGrupo,$request->esAdminGeografico);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('sec_roles', function (Request $request) {
	$json = '';
	try {
		$sec_roles = new Sec_rolesController();
		$res = $sec_roles->update($request->id,$request->rol,$request->esAdminGlogal,$request->esAdminGrupo,$request->esAdminGeografico);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>