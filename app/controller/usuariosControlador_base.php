<?php

/*
----Creado----2020-07-07 09:18:39.3339277 -0300 -03 m=+0.535741201
*/
include_once(app_path().'\model\usuarios.php');

class UsuariosController_base {

	private $model; 

	public function __construct(){
		$this->model = new Usuarios();
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