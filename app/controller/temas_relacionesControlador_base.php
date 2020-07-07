<?php

/*
----Creado----2020-07-07 09:18:39.3149797 -0300 -03 m=+0.516793301
*/
include_once(app_path().'\model\temas_relaciones.php');

class Temas_relacionesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Temas_relaciones();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $idTema, $idTemaRel){
		return $this->model->getByPrim( $idTema, $idTemaRel);
	}

	public function delByPrim( $idTema, $idTemaRel){
		return $this->model->delByPrim( $idTema, $idTemaRel);
	}
}
?>