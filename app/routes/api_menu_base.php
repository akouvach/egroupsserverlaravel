<?php

/*
----Creado----2020-07-09 11:42:50.0224661 -0300 -03 m=+0.445149701
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\menuController.php');

Route::get('menu', function () {
	$json = '';
	try {
		$menu = new MenuController();
		$json =json_encode($menu->getAll());
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::get('menu/{id}', function ($id) {
	$json = '';
	try {
		$menu = new MenuController();
		$json = json_encode($menu->getByPrim($id));
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('menu', function (Request $request) {
	$json = '';
	try {
		$menu = new MenuController();
		$json = $menu->create($request->ruta,$request->menu,$request->menuIdPadre);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('menu', function (Request $request) {
	$json = '';
	try {
		$menu = new MenuController();
		$json = $menu->update($request->id,$request->ruta,$request->menu,$request->menuIdPadre);
		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::delete('menu', function (Request $request) {
	$json = '';
	try {
		$menu = new MenuController();
		$json = $menu->delByPrim($request->id); 

		http_response_code(200);
	} catch (Exception $ex){
		$json = json_encode(["rta"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>