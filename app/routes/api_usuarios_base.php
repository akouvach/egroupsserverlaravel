<?php

/*
----Creado----2020-07-09 11:42:50.3886214 -0300 -03 m=+0.811305001
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\usuariosController.php');

Route::get('usuarios', function () {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$json =json_encode($usuarios->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('usuarios/{id}', function ($id) {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$json = json_encode($usuarios->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('usuarios', function (Request $request) {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$json = $usuarios->create($request->nombre,$request->apellido,$request->email,$request->usuario,$request->genero,$request->fecha_nac,$request->pass);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('usuarios', function (Request $request) {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$json = $usuarios->update($request->id,$request->nombre,$request->apellido,$request->email,$request->usuario,$request->genero,$request->fecha_nac,$request->pass);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('usuarios', function (Request $request) {
	$json = '';
	try {
		$usuarios = new UsuariosController();
		$json = $usuarios->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>