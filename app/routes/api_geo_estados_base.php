<?php

/*
----Creado----2020-07-07 09:18:39.0028249 -0300 -03 m=+0.204639401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_estados_controller.php');

Route::get('geo_estados', function () {
$json = '';
try {
	$geo_estados = new Geo_estadosController();
	return response($geo_estados->getAll(),200);
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