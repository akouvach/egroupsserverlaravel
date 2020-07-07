<?php

/*
----Creado----2020-07-07 09:18:38.9858573 -0300 -03 m=+0.187671901
*/
include_once(app_path().'\model\geo_estados.php');

class Geo_estadosController_base {

	private $model; 

	public function __construct(){
		$this->model = new Geo_estados();
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