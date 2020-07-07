<?php

/*
----Creado----2020-07-07 09:18:39.2471594 -0300 -03 m=+0.448973201
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_roles_permisos_controller.php');

Route::get('sec_roles_permisos', function () {
$json = '';
try {
	$sec_roles_permisos = new Sec_roles_permisosController();
	return response($sec_roles_permisos->getAll(),200);
} catch (Error $err){
	$json = json_encode(["ok"=>false,"payload"=>utf8_encode($err->getMessage())]);;
	http_response_code(500);
} catch (Exception $ex){
	$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
	http_response_code(500);
} finally {
	echo $json;
}
});
?>