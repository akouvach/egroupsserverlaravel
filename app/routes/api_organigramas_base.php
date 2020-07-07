<?php

/*
----Creado----2020-07-07 09:18:39.1873195 -0300 -03 m=+0.389133501
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\organigramas_controller.php');

Route::get('organigramas', function () {
$json = '';
try {
	$organigramas = new OrganigramasController();
	return response($organigramas->getAll(),200);
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