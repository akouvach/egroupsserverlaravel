<?php

/*
----Creado----2020-07-07 09:18:39.0367218 -0300 -03 m=+0.238536201
*/
include_once(app_path().'\model\geo_paises.php');

class Geo_paisesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Geo_paises();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $id){
		return $this->model->getByPrim( $id);
	}

	public function delByPrim( $id){
		return $this->model->delByPrim( $id);
	}
}
?>