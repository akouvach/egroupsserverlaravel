<?php

/*
----Creado----2020-07-07 09:18:39.1195016 -0300 -03 m=+0.321315801
*/
include_once(app_path().'\model\grupos_relaciones.php');

class Grupos_relacionesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Grupos_relaciones();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $grupo_origen, $grupo_destino){
		return $this->model->getByPrim( $grupo_origen, $grupo_destino);
	}

	public function delByPrim( $grupo_origen, $grupo_destino){
		return $this->model->delByPrim( $grupo_origen, $grupo_destino);
	}
}
?>