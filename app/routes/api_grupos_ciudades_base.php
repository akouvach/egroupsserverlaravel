<?php

/*
----Creado----2020-07-09 11:42:49.9158442 -0300 -03 m=+0.338527801
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\grupos_ciudadesController.php');

Route::get('grupos_ciudades', function () {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$json =json_encode($grupos_ciudades->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('grupos_ciudades/{idCiudad}/{idGrupo}/{fechaDesde}', function ($idCiudad,$idGrupo,$fechaDesde) {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$json = json_encode($grupos_ciudades->getByPrim($idCiudad,$idGrupo,$fechaDesde));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('grupos_ciudades', function (Request $request) {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$json = $grupos_ciudades->create($request->idCiudad,$request->idGrupo,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('grupos_ciudades', function (Request $request) {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$json = $grupos_ciudades->update($request->idCiudad,$request->idGrupo,$request->fechaDesde);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('grupos_ciudades', function (Request $request) {
	$json = '';
	try {
		$grupos_ciudades = new Grupos_ciudadesController();
		$json = $grupos_ciudades->delByPrim($request->idCiudad,$request->idGrupo,$request->fechaDesde); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>