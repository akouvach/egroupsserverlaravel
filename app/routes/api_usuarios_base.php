<?php

/*
----Creado----2020-07-07 09:18:39.3508909 -0300 -03 m=+0.552704401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\usuarios_controller.php');

Route::get('usuarios', function () {
$json = '';
try {
	$usuarios = new UsuariosController();
	return response($usuarios->getAll(),200);
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