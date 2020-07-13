<?php

/*
----Creado----2020-07-09 11:42:49.9690367 -0300 -03 m=+0.391720301
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\api\login.php');

 
Route::post('login', function (Request $request) {
	$json = '';
	try {
        $miCredencial = new Login();
        $json = $miCredencial->getToken($request);
		// $grupos_relaciones = new Grupos_relacionesController();
		// $json = $grupos_relaciones->create($request->grupo_origen,$request->grupo_destino,$request->tipo_relacion,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


?>