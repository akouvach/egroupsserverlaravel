<?php

/*
----Creado----2020-07-08 18:41:46.02767 -0300 -03 m=+1.942716901
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\usuariosController.php');

Route::get('usuarios', function () {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		return response($usuarios->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('usuarios', function (Request $request) {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$res = $usuarios->create($request->id,$request->nombre,$request->apellido,$request->email,$request->usuario,$request->genero,$request->fecha_nac,$request->pass);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('usuarios', function (Request $request) {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$res = $usuarios->update($request->id,$request->nombre,$request->apellido,$request->email,$request->usuario,$request->genero,$request->fecha_nac,$request->pass);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>