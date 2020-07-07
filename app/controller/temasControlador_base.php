<?php

/*
----Creado----2020-07-07 09:18:39.2800725 -0300 -03 m=+0.481886201
*/
include_once(app_path().'\model\temas.php');

class TemasController_base {

	private $model; 

	public function __construct(){
		$this->model = new Temas();
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