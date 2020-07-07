<?php

/*
----Creado----2020-07-07 09:18:39.0825995 -0300 -03 m=+0.284413801
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\grupos_controller.php');

Route::get('grupos', function () {
$json = '';
try {
	$grupos = new GruposController();
	return response($grupos->getAll(),200);
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