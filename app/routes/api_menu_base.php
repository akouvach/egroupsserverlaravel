<?php

/*
----Creado----2020-07-08 18:41:45.1190756 -0300 -03 m=+1.034122501
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include_once(app_path().'\controller\menuController.php');

Route::get('menu', function () {
	$json = '';
	try {
		$menu = new MenuController();
		return response($menu->getAll(),200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});


Route::post('menu', function (Request $request) {
	$json = '';
	try {
		$menu = new MenuController();
		$res = $menu->create($request->id,$request->ruta,$request->menu,$request->menuIdPadre);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
Route::put('menu', function (Request $request) {
	$json = '';
	try {
		$menu = new MenuController();
		$res = $menu->update($request->id,$request->ruta,$request->menu,$request->menuIdPadre);
		return response($res,200);
	} catch (Exception $ex){
		$json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);;
		http_response_code(500);
	} finally {
		echo $json;
	}
});
?>