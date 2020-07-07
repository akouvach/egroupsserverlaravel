<?php

/*
----Creado----2020-07-07 09:18:39.2671063 -0300 -03 m=+0.468920001
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\sec_roles_usuarios_controller.php');

Route::get('sec_roles_usuarios', function () {
$json = '';
try {
	$sec_roles_usuarios = new Sec_roles_usuariosController();
	return response($sec_roles_usuarios->getAll(),200);
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