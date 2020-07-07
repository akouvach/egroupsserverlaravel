<?php

/*
----Creado----2020-07-07 09:18:38.9719038 -0300 -03 m=+0.173718401
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\geo_ciudades_controller.php');

Route::get('geo_ciudades', function () {
$json = '';
try {
	$geo_ciudades = new Geo_ciudadesController();
	return response($geo_ciudades->getAll(),200);
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