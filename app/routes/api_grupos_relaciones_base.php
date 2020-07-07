<?php

/*
----Creado----2020-07-07 09:18:39.1514158 -0300 -03 m=+0.353229901
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\grupos_relaciones_controller.php');

Route::get('grupos_relaciones', function () {
$json = '';
try {
	$grupos_relaciones = new Grupos_relacionesController();
	return response($grupos_relaciones->getAll(),200);
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