<?php

/*
----Creado----2020-07-07 09:18:38.9659108 -0300 -03 m=+0.167725401
*/
include_once(app_path().'\model\geo_ciudades.php');

class Geo_ciudadesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Geo_ciudades();
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